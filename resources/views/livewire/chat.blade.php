<div class="inbox_msg">
    <div class="inbox_people">
        <div class="headind_srch">
            <div class="recent_heading">
                <h4>Recent</h4>
            </div>
            <div class="srch_bar">
                <div class="stylish-input-group">
                    <input type="text" class="search-bar"  placeholder="Search" >
                    <span class="input-group-addon">
                                  <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                </div>
            </div>
        </div>

        <div class="inbox_chat">
            @forelse($chats as $chat)
                <div wire:click="setChatId({{$chat->id}})" class="chat_list {{$chatId == $chat->id? 'active_chat' : ''}}">
                    <div class="chat_people">
                        <div class="chat_img"> <img src="{{$chat->receiver->image}}" alt="sunil"> </div>
                        <div class="chat_ib">
                            <h5>{{$chat->receiver->name}} <span class="chat_date">{{$chat->latestMessageCreatedAt()}}</span></h5>
                            <p>{{$chat->latestMessage()}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="inbox_chat">
                    <div class="chat_list active_chat">
                        <div class="chat_people">
                            No Chat Found
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
    @if(count($messages))
    <div class="mesgs">
        <div class="msg_history" wire:poll.500ms="getMessages">
            @foreach($messages as $message)
                @if($message->admin_id != auth()->id())
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="{{$message->admin->image}}" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>
                                    {{$message->message}}
                                </p>
                                <span class="time_date">
                                    {{$message->send_at}}
                                </span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>
                                {{$message->message}}
                            </p>
                            <span class="time_date">
                             {{$message->send_at}}
                                @if($message->seen)
                                <span>
                                <i style="color:#5abbff" class="fas fa-check"></i> seen
                                </span>
                                @else
                                <span>
                                    <i class="fas fa-check"></i>
                                </span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="type_msg">
            <div class="input_msg_write">
                <input wire:model="message" type="text" class="write_msg" placeholder="Type a message" />
                <button wire:click="sendMessage" class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    @else
        <div class="mesgs">
            No Chat Selected
        </div>
    @endif
</div>
<script>

</script>
