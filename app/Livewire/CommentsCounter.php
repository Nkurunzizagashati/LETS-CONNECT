<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentsCounter extends Component
{

    public function render()
    {
        return view('livewire.comments-counter');
    }
}
