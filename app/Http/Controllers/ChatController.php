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
            $chat = $request;
            $chat->save();

            $chats=Chat::where('patient_id',$request->patient_id)->get();

            return $chats;
        }
        catch(\Exception $e){
            return 'failed';
        }


    }
}
