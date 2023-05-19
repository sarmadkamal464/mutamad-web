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
            "message_id" => $request->message_id,
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

    public function getChat(Request $request, $rid)
    {   
        $allChat = \DB::table('chats')
            ->select('id','sender_id as sender', 'sender_id', 'receiver_id', 'message', 'read', 'created_at')
            ->where('receiver_id', $rid)
            ->groupBy('sender_id')
            ->orderBy('id', 'desc')
            ->latest()
            ->get();

        foreach( $allChat  as $chat) {
            $senderName = \DB::table('users')->select('name')->where('id', $chat->sender)->get();
            $chat->sender = $senderName[0]->name;
        }
        $message = "All chat retrieved successfully";
        return response()->json(['success' => true, 'data'=> $allChat]);
    }

    public function readMessage(Request $request, $rid, $sid, $mid)
    {
        $getMessagesId = \DB::table('chats')->where('receiver_id', $rid)->where(function($query) use ($sid,$mid){
            $query->where('sender_id', $sid);
            $query->where('id', '<=', $mid);
        })->get();
        foreach($getMessagesId as $message) {
            \DB::table('chats')->where('id', $message->id)->update(['read' => 1]);
        }
        return response()->json(['success' => true]);
    }
}
