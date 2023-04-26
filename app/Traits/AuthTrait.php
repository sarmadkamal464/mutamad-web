<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

trait AuthTrait
{
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
            return $this->response->errorResponse($request, 'Invalid credentials', 403);
        }
        $user = Auth::user();
        if($user->is_active == 0) {
            return $this->response->errorResponse($request, 'Your account is deactivated. Please contact on this email: abc@test.com', 403);
        }
        $token = '';
        if ($request->device_type == 'web') {
            Session::put('role', $user->role);
            Session::flash('message', 'Logged In Successfully');
            return redirect()->route('home');
        } else {
            $token = $user->createToken('MyApp')->accessToken;
        }
        $data = User::with('category')->findOrFail($user->id);
        // $data->update([
        //     'is_active' => 1,
        //     'deactivate_reason' => null
        // ]);
        return $this->response->collectionResponse($request, ['token' => $token, 'user' => $data]);
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:25|regex:/^[\pL\s\-]+$/u',
            'username' => 'required|string|max:25|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users|max:30|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required',
            'country' => 'required',
            'category' => Rule::requiredIf(function () use ($request) {
                return $request->input('role') === 'freelancer';
            }),
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'country' => $request->country,
            'role' => strtolower($request->role),
            'category_id' => $request->input('role') === 'freelancer' ? $request->category : null,
        ]);
        $user->save();
        $token = '';
        if ($request->device_type == 'web') {
            Session::put('username', $request->username);
            Session::put('email', $request->email);
            Session::put('role', $request->role);
            Session::put('name', $request->name);
            Session::flash('message', 'Your Account is Created Successfully');
            auth()->attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('home');
        } else {
            $token = $user->createToken('MyApp')->accessToken;
        }
        return $this->response->collectionResponse($request, ['token' => $token, 'user' => $user]);
    }

    public function requestResetPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'exists' => 'Email is not registered in our system',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $user = User::where('email', $request->email)->first();
        $token = Str::random(60);
        $hashToken = Hash::make($token);
        $user->update([
            'resetToken' => $hashToken,
        ]);
        $mail = new SendMail('Request for change password', $user->name, $hashToken, 'emails.resetPassword');
        Mail::to($request->email)->queue($mail);
        return $this->response->successResponse($request, 'Email Sent Successfully');
    }

    public function logout(Request $request)
    {
        $request->device_type == 'web'
            ? Session::flush()
            : $request
            ->user()
            ->token()
            ->delete();
        return $this->response->successResponse($request, 'User Logout Successfully');
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

    public function deactivateAccount(Request $request)
    {
        $rules = [
            'deactivate_reason' => 'required',
        ];
        $customMessages = [
            'required' => 'Please Enter the Deactivation Reason',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $user = User::find(Auth::user()->id);
        if($request->deactivate_reason == "Others") {
            $request['deactivate_reason'] =$request->other;
        }
        $user->update(['deactivate_reason' => $request->deactivate_reason, 'is_active' => 0]);
        // $request->device_type == 'web'
        //     ? Session::flush()
        //     : $request
        //     ->user()
        //     ->token()
        //     ->delete();
        return $this->response->successResponse($request, 'Your account is deactivated successfully');
    }

    public function activateAccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update(['is_active' => 1, 'deactivate_reason'=> NULL]);
        return $this->response->successResponse($request, 'Account is activated successfully');
    }
}
