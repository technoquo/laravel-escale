<?php

namespace App\Http\Controllers;

use App\Models\AccompagnementType;
use Illuminate\Http\Request;

class AccompagnementTypeController extends Controller
{
    public function index($slug)
    {

        $accompagnement = AccompagnementType::where('slug', $slug)->first();


        return view('type', [
            'accompagnement' => $accompagnement
        ]);
    }
}
