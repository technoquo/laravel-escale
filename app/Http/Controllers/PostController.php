<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->first();
        return view('posts.post', compact('post'));
    }
}
