@extends('layouts.admin')

@section('content')
    <h1>User Profile</h1>
    <table>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>About Me</th>
            <td>{{ $user->about_me }}</td>
        </tr>
        <tr>
            <th>Birthday</th>
            <td>{{ $user->birthday }}</td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td><img src="{{ asset($user->avatar) }}" alt="avatar" style="width: 150px; height: 150px"></td>
        </tr>
        <tr>
            <th>Creation Date</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Promote to Admin</th>
            <td>
                <form action="{{ route('admin_promote_user', $user->id) }}" method="POST">
                    @csrf
                    <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
    </table>
@endsection
