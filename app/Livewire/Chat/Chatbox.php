<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Chatbox extends Component
{

    public $selectedConversation;
    public $receiverInstance;
    public $messages;

    #[On('loadConversation')]

    public function loadConversation(Conversation $conversation, User $receiver)
    {

        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)->get();
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
