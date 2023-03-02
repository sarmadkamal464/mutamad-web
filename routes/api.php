<?php

use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(
    function () {
        Route::get('/', function () {
            dd('Welcome to Mutamad-API');
        });
        Route::post('/signup', [UserApiController::class, 'signup']);
        Route::post('/login', [UserApiController::class, 'login']);
        Route::get('login/facebook', 'UserApiController@redirectToFacebook');
        Route::get('login/facebook/callback', 'UserApiController@handleFacebookCallback');
        Route::get('login/linkedin', 'UserApiController@redirectToLinkedIn');
        Route::get('login/linkedin/callback', 'UserApiController@handleLinkedInCallback');
        Route::get('login/google', [UserApiController::class, 'redirectToGoogle']);
        Route::get('login/google/callback', [UserApiController::class, 'handleGoogleCallback']);


        Route::middleware('auth')->group(function () {
        });
    }
);
