<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StripeClient;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Token;
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
    // dd($request->all());
    $userId = Auth::user()->id;
    $checkStripeUser = StripeClient::where('user_id', $userId)->get();
    if(empty($checkStripeUser->toArray())) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
    ]);

    if ($validator->fails()) {
        return $this->response->validationErrorResponse($request, $validator);
    }

    // Set your Stripe secret key
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    // Extract customer data from the request
    $name = $request->input('name');
    $email = $request->input('email');
    $expirationMonth = $request->input('expirationMonth');
    $expirationYear = $request->input('expirationYear');
    $cvc = $request->input('cvc');
    try {
        // Create a new customer in Stripe
        $customer = \Stripe\Customer::create([
            'name' => $name,
            'email' => $email,
            'ExpYear'=>$expirationYear,
            'ExpMonth'=>$expirationMonth,
            'Cvc'=>$cvc
        ]);

        // For example, you can store the customer ID in your database
        $customerId = $customer->id;
        $customerModel = new StripeClient();
        $customerModel->name = $name;
        $customerModel->email = $email;
        $customerModel->customer_id = $customerId;
        $customerModel->user_id = $userId;
        $customerModel->save();

        return response()->json(['success' => true, 'message' => 'Customer Created Successfully']);
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card error
            return response()->json($e->getMessage(), 400);
        } catch (\Stripe\Exception\InvalidRequestException | \Stripe\Exception\AuthenticationException | \Stripe\Exception\ApiConnectionException | \Stripe\Exception\ApiErrorException $e) {
            // Handle other Stripe-related exceptions
            return response()->json('An error occurred while creating the customer.', 500);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'Customer Already exist']);
    }
}


 public function addFreelancerAccount(Request $request)
{
    dd($request);
    $name = $request->input('name');
    $email = $request->input('email');
    $accountNumber = $request->input('accountNumber');
    $accountHolderName = $request->input('accountHolderName');
    $bankName = $request->input('bankName');

    // Set your Stripe secret key
   \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    try {
        // Step 1: Create a bank account token using the bank account details
        $bankAccountToken = \Stripe\Token::create([
            'bank_account' => [
                'currency' => 'usd',
                'country' => 'US',
                'account_holder_name' => $accountHolderName,
                'account_holder_type' => 'individual',
                'account_number' => $accountNumber
             
            ],
        ]);

        // Step 2: Create a Custom account for the freelancer
        $account = \Stripe\Account::create([
            'type' => 'custom',
            'country' => 'US', 
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
