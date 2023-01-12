@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <p>You are viewing the profile of {{ $user->name }}</p>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>About Me: {{ $user->about_me }}</p>
        <p>Birthday: {{ $user->birthday }}</p>
        <img src="{{ asset($user->avatar) }}" alt="avatar" style="width: 500px; height: 500px">
    @else
        <p>You must log in first to access this profile</p>
    @endif
@endsection
