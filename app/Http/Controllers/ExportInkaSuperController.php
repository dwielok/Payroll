<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportInkaSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.export_inka');
    }
}