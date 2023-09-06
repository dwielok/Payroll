<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportTetapSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.import_tetap');
    }
}