<div wire:poll>
<div style="overflow-y: scroll; height:85%;background-color:black;">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @foreach($messages as $message)
<div class="row">
        @if($message->doctor_id=='x')
            <div style="width:90%;" class="talk-bubble tri-right left-top p-2">

            <div class="talktext">
                <p>{{$message->message}}</p>
                <p style="color:green;">{{$message->created_at->diffForHumans()}}</p>
            </div>
        </div>
        @else
            <div style="width:90%;"  class="talk-bubble tri-right right-top p-2">
                <div class="talktext" style="float:right;">
                    <p>{{$message->message}}</p>
                    <p style="color:green;">{{$message->created_at->diffForHumans()}}</p>
                </div>
            </div>

        @endif
</div>



    @endforeach
</div>
<div class="form-group">
    <input type="text" class="form-control" wire:model="text" Placeholder="Write your message here" />
</div>
<div class="form-group">
    <button  wire:click="sendText">Send</button>
</div>
</div>
