<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostComponent extends Component
{
    use WithFileUploads;

    #[Rule('required', 'string')]
    public $title;

    #[Rule('required')]
    public $description;

    #[Rule('string')]
    public $post_category;

    #[Rule('file|mimes:jpeg,png,pdf,jpg')]
    public $file;

    public function create()
    {
        $validated = $this->validate();

        $fileName = time() . '_' . $this->file->getClientOriginalName();
        $filePath = $this->file->storeAs('uploads', $fileName);

        $post = new Post();
        $post->title = $this->title;
        $post->user_id = auth()->id();
        $post->post_category = $this->post_category;
        $post->description = $this->description;
        $post->file_path = 'storage/' . $filePath;
        $post->save();

        // You can add additional logic or emit an event after saving the post

        $this->reset(); // Clear the form fields
        session()->flash('success', "Post created!");
    }
    public function render()
    {
        return view('livewire.post-component');
    }
}
