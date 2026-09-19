<?php

namespace App\Http\Controllers;

use App\Models\Convention;

class ConventionController extends Controller
{
    public function index()
    {
        $conventions = Convention::with('items')->get();

        return view('convention', compact('conventions'));
    }
}
