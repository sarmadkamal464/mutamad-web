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

    public function getUserChat(Request $request, $id)
    {
        $chat = Chat::where('receiver_id', $id)->get();
        return $this->response->collectionResponse($request, $chat? $chat : []);
    }
}
