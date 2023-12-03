<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class SendMessage extends Component
{
    public $conversation;
    public $receiver;
    public $body;

    public function mount(User $receiverInstance, Conversation $selectedConversation)
    {
        $this->receiver = $receiverInstance;
        $this->conversation = $selectedConversation;
    }

    public function sendMessage()
    {
        $createdMessage = Message::create([
            'conversation_id' => $this->conversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiver->id,
            'body' => $this->body,
        ]);

        $this->conversation->last_time_message = $createdMessage->created_at;
        $this->conversation->save();

        $this->dispatch('pushMessage', $createdMessage->id);

        $this->dispatch('refresh');

        $this->reset('body');
    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
