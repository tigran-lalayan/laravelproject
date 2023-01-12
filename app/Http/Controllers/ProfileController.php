<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }



    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'about_me' => 'nullable', // setting the validation as nullable means it's not required
            'birthday' => 'nullable|date', // adding the date validation for the birthday field

        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about_me = $request->input('about_me');
        $user->birthday = $request->input('birthday');
        if($request->hasFile('avatar')){
            $user->avatar = $this->updateAvatar($request);
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Your profile has been updated.');
    }


    public function updateAvatar(Request $request)
    {
        // Validate the request data
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Retrieve the user's ID
        $user_id = auth()->user()->id;

        // Get the uploaded avatar file
        $avatar = $request->file('avatar');

        // Generate a unique file name
        $file_name = time().'.'.$avatar->getClientOriginalExtension();

        // Move the file to the avatar directory
        $avatar->store('avatars', 'public');

        // Update the user's avatar in the database
        User::whereId($user_id)->update(['avatar' => $file_name]);

        // Return back with success message
        return $file_name;
    }


}



