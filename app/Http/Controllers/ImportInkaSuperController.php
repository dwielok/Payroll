<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportInkaSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.import_inka');
    }
}