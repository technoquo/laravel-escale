<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Location;
use App\Models\NumberTransport;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $contact = Contact::first();
        $location = Location::first();
        $buses = NumberTransport::where('transport_id', 1)->get();
        
        $trams = NumberTransport::where('transport_id', 2)->get();

        return view('contact', ['contact' => $contact, 'latitude' => $location->latitude, 'longitude' => $location->longitude,'buses' => $buses, 'trams' => $trams]);
    }
}
