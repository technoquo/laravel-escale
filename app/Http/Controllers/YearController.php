<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{

    public function index()
    {

        $years = Year::where('status', 1)->orderBy('title', 'desc')->get();

        return view('photos', [
            'years' => $years,

        ]);
    }

    public function photos($year)
    {

        $year = Year::where('title', '=', $year)->first(); // Replace 1 with the actual year ID
        $id_year = $year->id;

        $year = $year->title;


        $galleries = Gallery::where('year_id', $id_year)->where('status', 1)->get();

        return view('details', [
            'galleries' => $galleries,
            'year' => $year

        ]);
    }
}
