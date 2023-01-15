@extends('layouts.admin')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <tr data-user-id="{{ $user->id }}">
        <td>{{ $user->name }}</td>
            <td>{{ $user->description }}</td>
            <td>{{ $user->birthday }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a href="{{ route('admin_user_profile', $user->id) }}">View Profile</a>
                <form action="{{ route('admin_promote_user', $user->id) }}" method="POST" id="promoteForm">
                    @csrf
                    @method('POST')
                    <input type="checkbox" name="is_admin" onchange="promoteUser(this)" {{ $user->is_admin ? 'checked disabled' : '' }}> Promote to Admin
                </form>




            </td>
        </tr>
    @endforeach
    <script>

        function promoteUser(checkbox) {
            var userId = $(checkbox).closest('tr').data('user-id');
            var isAdmin = checkbox.checked;

            $.ajax({
                url: '/admin/users/' + userId + '/promote',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_admin: isAdmin
                },
                success: function() {
                    // Handle success
                },
                error: function() {
                    // Handle error
                }
            });

        }

    </script>
    </tbody>
</table>
@endsection
