<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {

        $historiques = Historique::where('status', 1)->get();

        return view('historique', [
            'historiques' => $historiques
        ]);
    }
}
