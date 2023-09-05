<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapSuperController extends Controller
{
    public function index()
    {
        return view('superuser.rekap');
    }
}