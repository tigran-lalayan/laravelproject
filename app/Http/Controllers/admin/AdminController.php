<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('admin_dashboard');
        }


    }

}

