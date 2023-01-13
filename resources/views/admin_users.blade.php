@extends('layouts.admin')

@section('content')
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Birthday</th>
        <th>Creation Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->description }}</td>
            <td>{{ $user->birthday }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a href="{{ route('admin_user_profile', $user->id) }}">View Profile</a>
                <form action="{{ route('admin_promote_user', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="checkbox" name="is_admin" onchange="this.form.submit()" {{ $user->is_admin ? 'checked' : '' }}> Promote to Admin
                </form>


            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
