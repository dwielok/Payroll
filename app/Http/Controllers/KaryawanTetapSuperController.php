<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanTetapSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.karyawan_tetap');
    }
}
