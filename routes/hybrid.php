<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
Hybrid Application Routes File which is available both in web and api php route file
*/

Route::get('/getCategories', [CategoryController::class, 'index']);
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::post('request-reset-password', [UserController::class, 'requestResetPassword']);
Route::post('validate-image', [SettingController::class, 'ImageValidation']);
