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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/hows-it-work', [HomeController::class, 'howsItWork']);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/signup', [HomeController::class, 'signup']);
Route::post('/signup', [UserController::class, 'signup']);
