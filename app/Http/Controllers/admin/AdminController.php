<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin_dashboard');
        } else {
            return redirect()->route('home');
        }
    }
}

