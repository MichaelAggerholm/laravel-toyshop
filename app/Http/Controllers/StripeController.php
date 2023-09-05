<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart'); // Get items and quantities from cart session
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            // For each item in the cart, create a line item for Stripe with the product title, price, color and quantity
            'payment_method_types' => ['card'],
            'line_items' => array_map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'dkk',
                        'product_data' => [
                            // Send name and color attributes to Stripe, so we can show the correct product in the Stripe checkout
                            'name' => $item['product']->getAttributes()['title'] . ' : ' . $item['color']->getAttributes()['name'],
                        ],
                        // Stripe requires the price in the smallest unit of the currency, so we multiply by 100 to get the price in kroner
                        'unit_amount' => $item['product']->getAttributes()['price'] * 100,
                    ],
                    'quantity' => $item['quantity'],
                ];
            }, $cart),
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('home'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('pages.checkoutSuccess');
    }
}

