<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user->isAdmin()) {
            return redirect()->back()->withErrors(['message' => 'You are not authorized to access this page']);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('admin.profile');
    }
}
