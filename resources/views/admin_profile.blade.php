@extends('layouts.admin')

@section('content')
    @if(Auth::check())
        <p>Hello, {{ Auth::user()->name }}!</p>
        <p>Welcome to your profile page</p>

        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>About Me: {{ $user->about_me }}</p>
        <p>Birthday: {{ $user->birthday }}</p>
        <p>Created at: {{ $user->created_at }}</p>
        <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="avatar" style="width: 500px; height: 500px">
        <p></p>
        <button type="button" id="edit-button">Edit</button>

        <form id="update-form" action="{{ route('admin_update_profile') }}" method="POST" enctype="multipart/form-data" style="display: none;">
            @csrf
            <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Name">
            <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email">
            <textarea name="about_me" placeholder="About Me">{{ Auth::user()->about_me }}</textarea>
            <input type="date" name="birthday" value="{{ Auth::user()->birthday }}" placeholder="Birthday">
            <input type="file" name="avatar" accept="image/*">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <script>
            document.getElementById("edit-button").addEventListener("click", function(){
                var form = document.getElementById("update-form");
                if(form.style.display === "none"){
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            });
        </script>
    @else
    <p>Only admins can access this page!</p>
    @endif
@endsection
