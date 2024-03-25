<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Location;
use App\Models\NumberTransport;
use App\Models\Transport;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $contact = Contact::first();
        $location = Location::first();
        $transports = Transport::all();
        foreach ($transports as $transport) {
            $transport->numbers = NumberTransport::where('transport_id', $transport->id)->get();
        }
       
       

        return view('contact', ['contact' => $contact, 'latitude' => $location->latitude, 'longitude' => $location->longitude,'transports' => $transports]);
    }
}
