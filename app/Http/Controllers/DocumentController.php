<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('status', 1)->get();

        return view('document', [
            'documents' => $documents
        ]);
    }
}
