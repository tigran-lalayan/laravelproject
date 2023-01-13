<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin_users', compact('users'));
    }

    public function promote(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $user->is_admin = "1";
        $user->save();

        return redirect()->route('admin_users')->with('success', 'User promoted to admin.');
    }



}
