<!-- admin layout -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the admin panel</h1>
        <nav>
            <ul>
                <li><a href="{{ route('admin_profile') }}">Users</a></li>
                <li><a href="{{ route('admin_users') }}">Settings</a></li>
            </ul>
        </nav>
        @yield('admin-content')
    </div>
@endsection
