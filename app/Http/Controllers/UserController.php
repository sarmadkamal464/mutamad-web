<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $response;

    public function __construct(ResponseController $response)
    {
        $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (!auth()->attempt([$fieldType => $request->email, 'password' => $request->password])) {
            return $this->response->errorResponse($request, 'Invalid credentials', 401);
        }
        $user = Auth::user();
        $token = '';
        if ($request->device_type == 'web') {
            Session::put('name', $user->name);
            Session::put('role', $user->role);
            Session::flash('message', 'Logged In Successfully');
            return redirect()->route('profile');
        } else {
            $token = $user->createToken('MyApp')->accessToken;
        }
        return $this->response->collectionResponse($request, ['token' => $token, 'user' => $user]);
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
            'country' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'role' => strtolower($request->role),
            'category_id' => $request->category,
        ]);
        $user->save();
        $token = '';
        if ($request->device_type == 'web') {
            Session::put('username', $request->username);
            Session::put('email', $request->email);
            Session::put('role', $request->role);
            Session::put('name', $request->name);
            Session::flash('message', 'Your Account is Created Successfully');
        } else {
            $token = $user->createToken('MyApp')->accessToken;
        }
        return $this->response->collectionResponse($request, ['token' => $token, 'user' => $user]);
    }

    public function requestResetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->response->errorResponse($request, 'Email is not registered in our system', 401);
        }
        $token = Str::random(60);
        $hashToken = Hash::make($token);
        $user->update([
            'resetToken' => $hashToken,
        ]);
        $mail = new SendMail('Request for change password', $user->name, $hashToken, 'emails.resetPassword');
        Mail::to($request->email)->queue($mail);
        return $this->response->successResponse($request, 'Email Sent Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->device_type == 'web' ? Session::flush() : Auth::logout();
        return $this->response->successResponse($request, 'User Logout Successfully');
    }

    public function myProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        return $this->response->collectionResponse($request, ['user' => $user]);
    }

    public function resetPassword(Request $request)
    {
        if ($request->has('token')) {
            $user = User::where('resetToken', $request->input('token'))->first();
            if ($user) {
                return view('site.auth.changePassword', ['token' => $request->input('token')]);
            }
        }
        return redirect()
            ->route('login')
            ->withErrors('Password Reset link is expired');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        if ($request->has('resetToken')) {
            $user = User::where('resetToken', $request->resetToken)->first();
            if ($user) {
                $user->update(['resetToken' => null, 'password' => bcrypt($request->password)]);
                Session::flash('message', 'Account Password Changed Successfully');
                return view('site.auth.login');
            }
        }
        return redirect()
            ->route('login')
            ->withErrors('Password Reset link is expired');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')
            ->stateless()
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')
            ->stateless()
            ->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return redirect()->route('signup', ['name' => urlencode($name), 'email' => urlencode($email)]);
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return redirect()->route('signup', ['name' => urlencode($name), 'email' => urlencode($email)]);
    }

    public function handleLinkedInCallback()
    {
        $user = Socialite::driver('linkedin')
            ->stateless()
            ->user();
        $name = $user->name;
        $email = $user->email;
        return redirect()->route('signup', ['name' => urlencode($name), 'email' => urlencode($email)]);
    }

    public function userProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        return $user->isFreelancer($user) ? view('site.freelancer.myProfile', ['user' => $user]) : view('site.client.myProfile', ['user' => $user]);
    }
}
