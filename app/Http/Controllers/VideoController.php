<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $videos = Video::where('status', 1)
            ->when($search, fn ($q) => $q->where('title', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%"))
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        return view('actualites-videos', [
            'videos' => $videos,
            'search' => $search,
        ]);
    }
}
