<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewInkaController extends Controller
{
    public function index()
    {
        return view('view_inka');
    }
}