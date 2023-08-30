<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewPkwtController extends Controller
{
    public function index()
    {
        return view('view_pkwt');
    }
}