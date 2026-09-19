<?php

namespace App\Http\Controllers;

use App\Models\Convention;

class ConventionController extends Controller
{
    public function index()
    {
        $conventions = Convention::where('status', 1)->with(['items' => fn ($q) => $q->where('status', 1)])->get();

        return view('convention', compact('conventions'));
    }
}
