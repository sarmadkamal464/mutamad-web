<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/freelancer/{slug}', [HomeController::class, 'freelancer']);
Route::get('/ongoingProject', [HomeController::class, 'ongoingProject']);
Route::get('/completedProject', [HomeController::class, 'completedProject']);
Route::get('/assignedProject', [HomeController::class, 'assignedProject']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/hows-it-work', [HomeController::class, 'howsItWork']);
Route::any('password/reset', [UserController::class, 'resetPassword']);
Route::post('changePassword', [UserController::class, 'changePassword']);
// Will redirect to profile if loggedIn
Route::group(['middleware' => 'auth.check'], function () {
    include 'hybrid.php';
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
    Route::get('/forgetPassword', [HomeController::class, 'forgetPassword']);
    Route::get('/changePassword', [HomeController::class, 'changePassword']);
    ##Socialite Login
    Route::get('login/facebook', [UserController::class, 'redirectToFacebook']);
    Route::get('login/facebook/callback', [UserController::class, 'handleFacebookCallback']);
    Route::get('login/linkedin', [UserController::class, 'redirectToLinkedIn']);
    Route::get('login/linkedin/callback', [UserController::class, 'handleLinkedInCallback']);
    Route::get('login/google', [UserController::class, 'redirectToGoogle']);
    Route::get('login/google/callback', [UserController::class, 'handleGoogleCallback']);
});
Route::get('logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    include "hybrid-auth.php";
    Route::get('profile', [HomeController::class, 'userProfile'])->name('profile');
});
