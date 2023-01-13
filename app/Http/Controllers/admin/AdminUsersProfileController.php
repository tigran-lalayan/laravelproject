<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUsersProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    public function show($id)
    {
        $user = Auth::user();
        if (!$user->isAdmin()) {
            return redirect()->back()->withErrors(['message' => 'You are not authorized to access this page']);
        }
        $viewUser = User::findOrFail($id);
        return view('admin_user_profile', ['user' => $viewUser]);
    }

    public function promote($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = "1";
        $user->save();

        return redirect()->route('admin_user_profile')->with('success', 'User promoted to admin.');
    }
}
