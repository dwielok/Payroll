<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiLemburPkwtSuperController extends Controller
{
    public function index()
    {
        return view('superuser.gaji_lembur_pkwt');
    }
}
