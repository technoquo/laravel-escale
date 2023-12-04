<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Location;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $contact = Contact::first();
        $location = Location::first();

        return view('contact', ['contact' => $contact, 'latitude' => $location->latitude, 'longitude' => $location->longitude]);
    }
}
