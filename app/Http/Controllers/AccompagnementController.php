<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accompagnement;

class AccompagnementController extends Controller
{
    public function index($slug)
    {

        $asbl = Accompagnement::where('slug', $slug)->first();


        return view('asbl', [
            'asbl' => $asbl
        ]);
    }
}
