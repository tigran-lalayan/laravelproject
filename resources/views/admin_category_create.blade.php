@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a new Category</h1>
        <form method="POST" action="{{ route('admin_category_store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
