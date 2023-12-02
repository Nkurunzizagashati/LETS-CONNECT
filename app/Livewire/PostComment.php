<?php

namespace App\Livewire;

use App\Events\CommentPosted;
use App\Models\Comment;
use App\Models\Post;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostComment extends Component
{
    #[Reactive]
    public Post $post;


    #[Rule('required|max:200')]
    public $message;

    public function postComment()
    {

        $this->validateOnly('message');

        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }


        $this->post->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $this->message
        ]);

        $this->dispatch('refresh-posts', post_Id: $this->post->id);
        $this->reset('message');
    }
    public function render()
    {
        $comments = $this->post->comments()->get();
        // dd($comments);
        return view('livewire.post-comment', compact('comments'));
    }
}
