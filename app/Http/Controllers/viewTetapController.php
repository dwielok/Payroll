<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewTetapController extends Controller
{
    public function index()
    {
        return view('view_tetap');
    }
}