<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new contact message.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('contact_create');
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('contact', compact('user'));
        } else {
            return view('contact');
        }
    }


    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        $validatedData['user_id'] = Auth::id();
        Contact::create($validatedData);

        return redirect()->route('home')->with('success', 'Your message has been sent successfully');
    }
}
