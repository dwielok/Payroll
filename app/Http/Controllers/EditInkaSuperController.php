<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditInkaSuperController extends Controller
{
    public function index()
    {
        return view('superuser.edit_inka');
    }
}
