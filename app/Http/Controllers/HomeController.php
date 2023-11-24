<?php

namespace App\Http\Controllers;

use App\Models\Accompagnement;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::where('status', 1)->get();
        $posts = Post::where('status', 1)->get();
        return view('home', [
            'sliders' => $sliders,
            'posts' => $posts
        ]);
    }





    public function contact()
    {
        return view('contact');
    }
}
