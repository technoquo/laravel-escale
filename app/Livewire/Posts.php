<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{

    public $posts;
    public function mount()
    {

        $this->posts = Post::where('status', 1)->get();
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
