<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatLog extends Component
{
    public $patient_id;
    public $text;

    public function sendText()
    {
       // dd('here');
        $chat=new Chat();
        $chat->patient_id=$this->patient_id;
        $chat->doctor_id=Auth::id();
        $chat->message=$this->text;
        $chat->save();
    }
    public function render()
    {
        //dd($this->patient_id);
        $messages=Chat::where('patient_id',$this->patient_id)->get();
        return view('livewire.chat-log',compact('messages'));
    }
}
