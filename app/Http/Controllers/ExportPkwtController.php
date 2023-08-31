<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportPkwtController extends Controller
{
    public function index()
    {
        return view('export_pkwt');
    }
}
