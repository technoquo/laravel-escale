<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;




    public function render()
    {
        // Use the Post model with pagination
        $posts = Post::where('status', 1)
            ->orderBy('date_published', 'desc')
            ->paginate(5); // You can adjust the number of items per page as needed

        return view('livewire.posts', ['posts' => $posts]);
    }
}
