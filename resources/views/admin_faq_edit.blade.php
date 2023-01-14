@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit FAQ</h1>
        <form action="{{ route('admin_faqs_update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" name="question" id="question" value="{{ $faq->question }}" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea class="form-control" name="answer" id="answer" rows="5" required>{{ $faq->answer }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
