<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;

class StripePaymentController extends Controller
{
   public function createCustomer(Request $request)
{
    // Set your Stripe secret key
    Stripe::setApiKey(config('services.stripe.secret'));

    // Extract customer data from the request
    $name = $request->input('name');
    $email = $request->input('email');
    $stripeToken = $request->input('stripeToken'); // Assuming you're receiving the token from the frontend

    // Create a new customer in Stripe
    $customer = Customer::create([
        'name' => $name,
        'email' => $email,
        'source' => $stripeToken,
        
    ]);

    // Handle the customer creation response
    // For example, you can store the customer ID in your database
    $customerId = $customer->id;

    // Return a response indicating success or failure
    return response()->json(['message' => 'Customer created successfully', 'customerId' => $customerId]);
}
}
