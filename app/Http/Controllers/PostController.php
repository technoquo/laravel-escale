<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->first();
        
        return view('posts.post', [
            'post' => $post,
            'ogDescription' => $post->title,
            'ogUrl' => config('app.url').'/'.$post->slug, // Assuming you have a route named 'posts.show' for viewing individual posts
            'ogImage' => config('app.url').'/storage/'. $post->image, // Assuming the image path is stored in the 'image' column of the 'posts' table
            //'keywords' => $post->keywords,
        ]);
    }
}