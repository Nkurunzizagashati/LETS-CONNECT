<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends Component
{
    public $conversations;
    public $receiverInstance;
    public $selectedConversation;

    protected $listeners = ['chatUserSelected', 'refresh'=>'$refresh'];
    public function chatUserSelected(Conversation $conversation, $receiverId)
    {

        $this->selectedConversation = $conversation;
        $receiverInstance = User::find($receiverId);

        $this->dispatch('loadConversation', $this->selectedConversation, $receiverInstance);
    }

    // #[On('refresh')]
    // public function refresh() {
    //     return $this->refresh();
    // }

    public function getChatUserInstance(Conversation $conversation, $request) {
        if($conversation->sender_id == auth()->id()) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        } else {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }

        if(isset($request)) {
            // dd($this->receiverInstance->$request);
            return $this->receiverInstance->$request;
        }
    }

    public function mount() {
        $this->conversations = Conversation::where('sender_id', auth()->id())
        ->orwhere('receiver_id', auth()->id())->orderBy('last_time_message', 'DESC')->get();
    }
    public function render()
    {
        $conversations = $this->conversations;
        return view('livewire.chat.chat-list', compact('conversations'));
    }
}
