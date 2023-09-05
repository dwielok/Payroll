<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanInkaSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.karyawan_inka');
    }
}