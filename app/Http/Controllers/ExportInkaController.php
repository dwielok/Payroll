<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportInkaController extends Controller
{
    public function index()
    {
        return view('export_inka');
    }
}
