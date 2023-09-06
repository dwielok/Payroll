<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSuperController extends Controller
{
    
    public function index()
    {
        return view('superuser.dashboard');
    }
}
