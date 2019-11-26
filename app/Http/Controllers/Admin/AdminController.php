<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   //---------------------Dashboard Method------------------//
    
    public function dashboard_index()
    {
        return view('admin.dashboard.dashboard');
    }
}
