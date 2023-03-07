<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
Hybrid Application Authenticated Routes File which is available both in web and api php route file
|
*/

Route::get('/my-profile', [UserController::class, 'myProfile']);
