<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        $intent = null;
        try {
            if ($request->payment_method_id) {
                //Create the PaymentIntent
                $intent = PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Cart::totalAmount() * 100,
                    'currency' => 'dkk',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                    'return_url' => route('success'),
                ]);
            }
            if ($request->payment_intent_id) {
                // Confirm the PaymentIntent to finalize payment after handling a required action
                $intent = PaymentIntent::retrieve(
                    $request->payment_intent_id
                );
                $intent->confirm();
            }
        } catch (ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

        // Store order in database

         return redirect()->route('success');
    }
}
