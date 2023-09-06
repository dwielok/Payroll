<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanPkwtSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.karyawan_pkwt');
    }
}