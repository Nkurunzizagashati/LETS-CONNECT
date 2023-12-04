<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Notifications\Sent;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SendMessage extends Component
{
    public $conversation;
    public $receiver;
    public $body;

    public $createdMessage;

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

        // broadcast

        $this->conversation->getReceiver()
                ->notify(new Sent(Auth()->user(), $createdMessage, $this->conversation, $this->receiver->id));

        // $this->dispatch('dispatchMessageSent')->self();
    }

    // #[On('dispatchMessageSent')]
    // public function dispatchMessageSent()
    // {
    //     broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->conversation, $this->receiver ));
    // }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
