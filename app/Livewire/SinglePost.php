<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;

class SinglePost extends Component
{
    // public function mount(HttpRequest $request)
    // {
    //     dd($request->id);
    // }

    public function deletePost($post)
    {
        dd($post);
    }
    public function render(Request $request)
    {
        $post = Post::find($request->id);
        return view('livewire.single-post', compact('post'));
    }
}
