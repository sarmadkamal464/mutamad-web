<?php

namespace App\Http\Controllers;

use Request;
use PRedis;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendMessage()
    {
        $redis = PRedis::connection();
        
        $data = ['message' => Request::input('message'), 'user' => Request::input('user')];
        
        $response = $redis->publish('message', json_encode($data));
        
        return response()->json(['success' => true, 'resp' => $response]);
    }   
}
