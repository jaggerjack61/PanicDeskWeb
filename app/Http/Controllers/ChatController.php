<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages($patient_id)
    {
        $messages=Chat::where('patient_id',$patient_id)->get();
        return $messages;
    }

    public function sendMessage(Request $request)
    {
        try {
            $chat = new Chat();
            $chat->patient_id = $request->patient_id;
		 $chat->message = $request->message;
            $chat->save();

            $chats=Chat::where('patient_id',$request->patient_id)->get();

            return $chats;
        }
        catch(\Exception $e){
            return 'failed';
        }


    }

    public function showChat($patient_id){
        return view('main.no-auth-chat-log',compact('patient_id'));

    }
}
