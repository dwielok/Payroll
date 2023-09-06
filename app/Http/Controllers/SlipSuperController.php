<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlipSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.slip');
    }
}