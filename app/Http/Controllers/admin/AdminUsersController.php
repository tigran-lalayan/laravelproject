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

    public function promote(Request $request, User $user)
    {
        $user->update(['is_admin'=>$request->input('is_admin')]);
        return redirect()->route('admin_user_profile', $user->id)->with('success', 'User promoted to admin.');
    }


    public function show(User $user)
    {

        return view('admin_user_profile', compact('user'));
    }


}
