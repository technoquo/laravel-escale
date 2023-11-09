<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Employee;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {

        $organes = Employee::where('administrations_id', 1)->get();
        $acompagnateurs = Employee::where('administrations_id', 2)->get();
        $directions = Employee::where('administrations_id', 3)->get();
        $animatrices = Employee::where('administrations_id', 4)->get();

        return view('equipe', [
            'organes' => $organes,
            'acompagnateurs' => $acompagnateurs,
            'directions' => $directions,
            'animatrices' => $animatrices
        ]);
    }
}
