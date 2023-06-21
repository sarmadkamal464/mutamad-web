<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Token;

class StripePaymentController extends Controller
{
    /**
     * Display the paymentStripe view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function paymentStripe()
    {
        return view('site.paymentStripe');
    }
    public function bankDetail()
    {
        return view('site.freelancer.bankDetails');
    }

    /**
     * Create a new customer in Stripe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustomer(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
       
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

 public function addFreelancerAccount(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $accountNumber = $request->input('accountNumber');
    $routingNumber = $request->input('routingNumber');
    $accountHolderName = $request->input('accountHolderName');
    $bankName = $request->input('bankName');

    // Set your Stripe secret key
    \Stripe\Stripe::setApiKey('STRIPE_SECRET_KEY');

    try {
        // Step 1: Create a bank account token using the bank account details
        $bankAccountToken = \Stripe\Token::create([
            'bank_account' => [
                'currency' => 'usd',
                'country' => 'US',
                'account_holder_name' => $accountHolderName,
                'account_holder_type' => 'individual',
                'account_number' => $accountNumber,
                'routing_number' => $routingNumber,
                
            ],
        ]);

        // Step 2: Create a Custom account for the freelancer
        $account = \Stripe\Account::create([
            'type' => 'custom',
            'country' => 'US', // Replace with the freelancer's country
            'email' => $email,
            'business_type' => 'individual',
            'individual' => [
                'email' => $email,
                'first_name' => $name,
                'last_name' => '',
            ],
        ]);

        // Step 3: Retrieve the freelancer's account ID
        $accountId = $account->id;

        // Step 4: Attach the bank account to the freelancer's account
        $externalAccount = \Stripe\Account::createExternalAccount(
            $accountId,
            [
                'external_account' => $bankAccountToken->id,
            ]
        );

        // Step 5: Handle any errors and provide appropriate feedback

        // Return a response indicating success and providing the freelancer's account ID
        return response()->json([
            'success' => true,
            'message' => 'Freelancer account created successfully',
            'accountId' => $accountId,
        ]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Handle Stripe API errors
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ]);
    }
}

}
