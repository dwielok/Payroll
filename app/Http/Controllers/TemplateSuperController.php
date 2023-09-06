<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateSuperController extends Controller
{
    public function index()
    {
        return view('superuser.template');
    }
}