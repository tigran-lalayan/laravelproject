@extends('layouts.admin')

@section('content')
<h1>Create FAQ</h1>
<form action="{{ route('admin_faq_store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="answer">Answer:</label>
        <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
