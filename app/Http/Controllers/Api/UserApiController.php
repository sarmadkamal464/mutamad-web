<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class UserApiController extends Controller
{

    protected $api;

    public function __construct(ApiController $api)
    {
        $this->api = $api;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (!auth()->attempt(array($fieldType => $request->email, 'password' => $request->password)))
            return $this->api->errorResponse('Invalid credentials', 401);
        $user = Auth::user();
        $token = $user->createToken('MyApp')->accessToken;
        return $this->api->collectionResponse(['token' => $token, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);
        if ($validator->fails())
            return $this->api->validationErrorResponse($request, $validator);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'role' => $request->role,
            'category_id' => $request->category_id
        ]);
        $user->save();
        $token = $user->createToken('MyApp')->accessToken;
        return $this->api->collectionResponse(['token' => $token, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return $this->api->successResponse('User Logout Successfully');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return $this->api->collectionResponse(['name' => $name, 'email' => $email]);
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return $this->api->collectionResponse(['name' => $name, 'email' => $email]);
    }

    public function handleLinkedInCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        $name = $user->name;
        $email = $user->email;
        return $this->api->collectionResponse(['name' => $name, 'email' => $email]);
    }
}
