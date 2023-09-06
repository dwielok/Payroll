<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportPkwtSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.import_pkwt');
    }
}