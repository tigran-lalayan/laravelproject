<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'about' => 'string|max:1000',
            'birthday' => 'date',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update the user's information
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->about = $validatedData['about'];
        $user->birthday = $validatedData['birthday'];
        $user->save();



        return redirect()->back()->with('status', 'Your profile was updated successfully!');
    }





}

