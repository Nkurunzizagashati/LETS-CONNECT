<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class AllUsers extends Component
{

    public $active;

    public function followOrUnfollow(User $user)
    {
        $follower = auth()->user();

        if ($follower->follows($user)) {
            $follower->followings()->detach($user);
            return;
        }

        $follower->followings()->attach($user);
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function checkConversation($user_id) {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }
        $checkedConversation = Conversation::where('sender_id', auth()->id())
            ->where('receiver_id', $user_id)->orwhere('receiver_id', auth()->id())
            ->where('sender_id', $user_id)->get();
        if($checkedConversation->count() > 0) {
            return $this->redirect(route('chat'), true);
        }

        Conversation::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user_id,
        ]);

        $this->redirect(route('chat'), true);

    }
    public function render()
{
    $active = $this->active;
    $users = User::where('id', '!=', auth()->id())->get();
    return view('livewire.all-users', compact('users', 'active'));
}
}
