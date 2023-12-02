<?php

namespace App\Livewire;

use App\Models\Post;
use Carbon\Doctrine\CarbonTypeConverter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    public $category;
    public $showPeople = false;


    public function setShowPeople()
    {
        $this->showPeople = !$this->showPeople;
    }

    public function hydrate()
    {
        // Dispatch the "page-reload" event during the hydration phase
        $this->dispatch('page-reload');
    }
    public function mount()
    {
        // Dispatch the "page-reload" event during the hydration phase
        $this->dispatch('page-reload');
    }
    public function render()
    {
        $showPeople = $this->showPeople;

        $posts = Post::latest()->get();
        return view('livewire.home-component', compact('posts', 'showPeople'));
    }
}
