<?php

namespace App\Http\Controllers;

use App\Models\Organigramme;
use Illuminate\Http\Request;

class OrganigrammeController extends Controller
{
    public function index()
    {

        $organigramme = Organigramme::first();

        return view('organigramme', [
            'organigramme' => $organigramme
        ]);
    }
}
