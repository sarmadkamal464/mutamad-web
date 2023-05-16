<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    protected $response;

    public function __construct(ResponseController $response)
    {
        $this->response = $response;
    }

    public function storeChat(Request $request)
    {
        $message = new Chat([
            "sender_id" => $request->sender_id,
            "receiver_id" => $request->receiver_id,
            "message" => $request->message,
            "read" => $request->read
        ]);
        $message->save();
        
        return response()->json(['success' => true]);
    }

    public function getUserChat(Request $request, $rid ,$sid)
    {   
        $chat = Chat::where('receiver_id', $rid)->where('sender_id', $sid)->orWhere(function($query) use ($rid, $sid){
            $query->where('receiver_id', $sid)->where('sender_id', $rid);
        })->get();
        //  dd($chat->all());
        // return response()->json(['success' => true]);
        $message = "chat retrieved successfully";
        return response()->json(['success' => true, 'messages'=> $chat]);
        // return $this->response->successResponse($request, $message, true, 'chat-messages');
        // return $this->response->collectionResponse($request, $chat? $chat->all() : []);
    }
}
