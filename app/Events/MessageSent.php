<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     public $user;
     public $message;
     public $conversation;
     public $receiver;
    public function __construct(User $user, Message $message, Conversation $conversation, User $receiver)
    {
        $this->user = $user;
        $this->receiver = $receiver;
        $this->conversation = $conversation;
        $this->message = $message;
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->user->id,
            'message_id' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'receiver_id' => $this->receiver->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        error_log($this->user);
        error_log($this->receiver);
        return [
            new PrivateChannel('chat' .$this->receiver->id),
        ];
    }
}
