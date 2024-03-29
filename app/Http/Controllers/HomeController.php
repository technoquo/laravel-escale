<?php

namespace App\Http\Controllers;

use App\Models\Accompagnement;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $sponsors = Sponsor::where('status', 1)->get();
        $sliders = Slider::where('status', 1)->get();
        $posts = Post::where('status', 1)->orderBy('date_published', 'desc')->paginate(10);
        return view('home', [
            'sliders' => $sliders,
            'posts' => $posts,
            'sponsors' => $sponsors
        ]);
    }
}
