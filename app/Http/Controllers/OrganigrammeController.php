<?php

namespace App\Http\Controllers;

use App\Models\Organigramme;
use Illuminate\Http\Request;

class OrganigrammeController extends Controller
{
    public function index()
    {

        $pdf = Organigramme::all()->first();

        return view('organigramme', [
            'pdf' => $pdf
        ]);
    }
}
