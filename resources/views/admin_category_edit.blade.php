@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit FAQ Category</h1>
        <form action="{{ route('admin_category_update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
