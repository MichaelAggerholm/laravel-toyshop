<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request) {

        // Validate the request input
        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ]);

        // Set Stripe public key
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        try {
            if ($request->payment_method_id) {
                //Create the PaymentIntent, this will create the order details to stripe
                // TODO: Opdater det her med mange flere brugerdetaljer, enten her, eller måske i det latterlige Javascript jeg fik tilføjet på checkout.blade.php
                // TODO: Det skal gøres med et 'line_items' object som i videoen her: https://www.youtube.com/watch?v=gkc1GcBKh1M
                // TODO: og alt skal med, farve, størrelse, antal, navn, pris, osv. osv.
                PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Cart::totalAmount() * 100,
                    'currency' => 'dkk',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'return_url' => route('success'),
                ]);
            }
        } catch (ApiErrorException $e) {
            // Handle error somewhat for now
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

        // Store order in database
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state, // TODO: Not using state
            'city' => $request->city,
            'zip' => $request->zipcode,
            'stripe_id' => $request->payment_method_id,
            'status' => 'pending',
            'total' => Cart::totalAmount() * 100,
        ]);

        // Store order items in database
        foreach (session()->get('cart') as $item) {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'color_id' => $item['color']['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Everything is done, payment done, order and order items stored in database, so we clear the cart
        session()->forget('cart');

        // Redirect to success page with order details
         return view('pages.orderSuccess', [
             'order' => $order,
         ]);
    }
}
