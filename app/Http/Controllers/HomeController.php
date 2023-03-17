<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    public function about()
    {
        return view('site.about');
    }

    public function privacyPolicy()
    {
        return view('site.privacyPolicy');
    }

    public function howsItWork()
    {
        return view('site.howsItWork');
    }

    public function login()
    {
        return view('site.auth.login');
    }

    public function signup(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        return view('site.auth.signup', ['categories' => Category::all(), 'countries' => Country::all(), 'name' => $name, 'email' => $email]);
    }

    public function forgetPassword()
    {
        return view('site.auth.forgetPassword');
    }

    public function userProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('site.shared.myProfile', ['user' => $user, 'countries' => Country::all()]);
    }
}
