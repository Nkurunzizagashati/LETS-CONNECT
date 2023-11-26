<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class HomeComponent extends Component
{
    public function test()
    {
        dd("linking");
    }
    public function render()
    {
        $posts = Post::paginate(6);
        return view('livewire.home-component', compact('posts'));
    }
}
