@extends('layouts.app')

@section('content')
    <h1>All Users</h1>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Birthday</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->description }}</td>
                <td>{{ $user->birthday }}</td>
                <td><a href="{{ route('user_profile', $user->id) }}">View Profile</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
