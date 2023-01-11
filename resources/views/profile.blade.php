@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->name }}!</p>
        <p>Welcome to your profile page</p>

        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

    @else
        <p>You must log in first to access your profile</p>
    @endif
@endsection

