<?php

namespace App\Livewire;

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
    public function render()
{
    $active = $this->active;
    $users = User::where('id', '!=', auth()->id())->get();
    return view('livewire.all-users', compact('users', 'active'));
}
}
