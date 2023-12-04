<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Notifications\Sent;
use Livewire\Attributes\On;
use Livewire\Component;

class Chatbox extends Component
{

    public $selectedConversation;
    public $receiverInstance;
    public $messages;

    protected $listeners = [
        'loadConversation',
        'pushMessage',
    ];

    #[On('loadConversation')]

    public function loadConversation(Conversation $conversation, User $receiver)
    {

        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)->get();
    }

    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcastedMessageReceived',
        ];
    }

    public function broadcastedMessageReceived($event)
    {

        dd($event);
        // if($event['type'] == Sent::class) {
        //     if($event['conversation_id'] == $this->conversation->id) {
        //         $newMessage = Message::find($event['message_id']);
                
        //         $this->messages->push($newMessage);
        //     }
        // }
    }

    #[On('pushMessage')]
    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
    }
    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
