<?php

namespace App\Http\Controllers;

use App\Models\Roi;

class RoiController extends Controller
{
    public function index()
    {
        $rois = Roi::with('items')->get();

        return view('roi', compact('rois'));
    }
}
