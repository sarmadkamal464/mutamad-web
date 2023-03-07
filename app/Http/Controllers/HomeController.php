<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;

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

    public function signup()
    {
        return view('site.auth.signup', ['categories' => Category::all(), 'countries' => Country::all()]);
    }

    public function forgetPassword()
    {
        return view('site.auth.forgetPassword');
    }
}
