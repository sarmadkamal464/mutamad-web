<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StripeClient;
use App\Models\Account;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Token;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
    $userId = $request->input('id');
    $checkStripeUser = StripeClient::where('user_id', $userId)->exists();

    if ($checkStripeUser) {
        return response()->json(['success' => false, 'message' => 'Card already exists.'], 500);
    }

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'number' => 'required',
        'exp_month' => 'required',
        'exp_year' => 'required',
        'cvc' => 'required',
        'id' => 'required'
    ]);

    if ($validator->fails()) {
        throw new ValidationException($validator);
    }

    \Stripe\Stripe::setApiKey("sk_test_51MPKvAEniYgzUx4Z8QTeDKeVZXCrk88PlQOT3zSh224WRNtWq4WiP63hU0a5nI2xl0LYEMn4dmwvKUX0ZQBsQ7uE00NOyTaRys");

    $name = $request->input('name');
    $email = $request->input('email');
    $cardNumber = $request->input('number');
    $expirationMonth = $request->input('exp_month');
    $expirationYear = $request->input('exp_year');
    $cvc = $request->input('cvc');
    try {
        $token = \Stripe\Token::create([
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expirationMonth,
                'exp_year' => $expirationYear,
                'cvc' => $cvc,
            ],
        ]);

        $customer = \Stripe\Customer::create([
            'name' => $name,
            'email' => $email,
            'source' => $token->id,
        ]);

        $customerId = $customer->id;

        $customerModel = new StripeClient();
        $customerModel->name = $name;
        $customerModel->email = $email;
        $customerModel->customer_id = $customerId;
        $customerModel->user_id = $userId;
        $customerModel->save();

        return response()->json(['success' => true, 'message' => 'Card Added successfully.']);
    } catch (\Stripe\Exception\CardException $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
    } catch (\Stripe\Exception\InvalidRequestException | \Stripe\Exception\AuthenticationException | \Stripe\Exception\ApiConnectionException | \Stripe\Exception\ApiErrorException $e) {
        return response()->json(['success' => false, 'message' => 'An error occurred while adding card.'], 500);
    }
}


public function addFreelancerAccount(Request $request)
{
    $userId = $request->input('id');
    $checkAccount = Account::where('user_id', $userId)->exists();

    if ($checkAccount) {
        return response()->json(['success' => false, 'message' => 'Account details already exist'], 500);
    }

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'account_number' => 'required',
        'routing_number' => 'required',
        'account_name' => 'required',
        'bank_name' => 'required',
        'id' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
    }

    try {
        $userId = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $accountNumber = $request->input('account_number');
        $routingNumber = $request->input('routing_number');
        $accountHolderName = $request->input('account_name');
        $bankName = $request->input('bank_name');

        $account = new Account();
        $account->user_id = $userId;
        $account->name = $name;
        $account->email = $email;
        $account->account_number = $accountNumber;
        $account->routing_number = $routingNumber;
        $account->account_name = $accountHolderName;
        $account->bank_name = $bankName;
        $account->save();

        return response()->json(['success' => true, 'message' => 'Account saved successfully']);
    } catch (\Illuminate\Database\QueryException $e) {
        // Handle the exception, log errors, or return an appropriate response
        return response()->json(['success' => false, 'message' => 'Failed to save account'], 500);
    }
}


public function createPayment(Request $request)
{
    // dd($request->toArray());
    $validator = Validator::make($request->all(), [
        'amount' => 'required|numeric',
        'id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $amountInDollars = $request->input('amount');
    $userId = $request->input('id');

    // Convert amount to cents
    $amountInCents = $amountInDollars * 100;

    // Retrieve StripeClient by user_id
    $stripeClient = StripeClient::where('user_id', $userId)->first();

    if (!$stripeClient) {
        return response()->json(['error' => 'Stripe client not found'], 404);
    }

    // Set your Stripe API key
    Stripe::setApiKey("sk_test_51MPKvAEniYgzUx4Z8QTeDKeVZXCrk88PlQOT3zSh224WRNtWq4WiP63hU0a5nI2xl0LYEMn4dmwvKUX0ZQBsQ7uE00NOyTaRys");

    try {
        // Create a payment intent with Stripe
        $paymentIntent = PaymentIntent::create([
            'amount' => $amountInCents,
            'currency' => 'usd',
            'customer' => $stripeClient->customer_id,
            'description' => 'Payment from the client',
        ]);

        // Handle successful payment intent creation
        // You can save the payment information to your database or perform any additional actions

        return response()->json(['success'=>true,'payment_id' => $paymentIntent->id], 201);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Handle Stripe errors
        return response()->json(['success' =>false, $e->getMessage()], 422);
    }
}

}
