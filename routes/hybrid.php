<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

/*
Hybrid Application Routes File which is available both in web and api php route file
*/

Route::get('/getCategories', [CategoryController::class, 'index']);
Route::get('/getCountries', [CountryController::class, 'getCountries']);

Route::get('/getProjectDuration', [ProjectController::class, 'getProjectDuration']);
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::post('request-reset-password', [UserController::class, 'requestResetPassword']);
Route::post('validate-image', [SettingController::class, 'ImageValidation']);
Route::post('store-chat', [ChatController::class, 'storeChat']);
Route::get('/get-user-chat/{id}', [ChatController::class, 'getUserChat']);

Route::get('/publish', function () {
    Redis::publish('test-channel', json_encode([
        'name' => 'Adam Wathan'
    ]));
});
