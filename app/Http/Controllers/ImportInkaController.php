<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportInkaController extends Controller
{
    public function index()
    {
        return view('import_inka');
    }
}
