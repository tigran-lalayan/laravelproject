@extends('layouts.admin')

@section('content')
    <h1>Faq Categories</h1>
    <a href="{{ route('admin_category_create') }}" class="btn btn-primary mb-3">Create New Category</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin_category_edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin_category_delete', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
