<?php

namespace App\Http\Controllers;

use App\Models\Roi;

class RoiController extends Controller
{
    public function index()
    {
        $rois = Roi::where('status', 1)->with(['items' => fn ($q) => $q->where('status', 1)])->get();

        return view('roi', compact('rois'));
    }
}
