@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('admin_faq_create') }}" class="btn btn-primary mb-3">Create FAQ</a>
    <a href="{{ route('admin_category_index') }}" class="btn btn-primary mb-3">Edit Categories</a>

    <table class="table">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->answer }}</td>
                <td>{{ $faq->category->name }}</td>
                <td>
                    <a href="{{ route('admin_faq_edit', $faq->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin_faq_delete', $faq->id) }}" method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
