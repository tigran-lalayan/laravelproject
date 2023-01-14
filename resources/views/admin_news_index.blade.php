@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Latest News</h1>
                <a href="{{ route('admin_news_create') }}" class="btn btn-success">Create News</a>
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Cover Image</th>
                        <th>Content</th>
                        <th>Publishing Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{ $new->title }}</td>
                            <td><img src="{{ $new->cover_image }}"></td>
                            <td>{{ $new->content }}</td>
                            <td>{{ $new->publishing_date }}</td>
                            <td>
                                <a href="{{ route('admin_news_edit', $new->id) }}">Edit</a>
                                <form action="{{ route('admin_news_destroy', $new->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin_news_create') }}" class="btn btn-primary">Create News</a>
            </div>
        </div>
    </div>
@endsection
