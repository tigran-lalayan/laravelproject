@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Latest News</h1>
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Cover Image</th>
                        <th>Content</th>
                        <th>Publishing Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{ $new->title }}</td>
                            <td><img src="{{ $new->cover_image }}"></td>
                            <td>{{ $new->content }}</td>
                            <td>{{ $new->publishing_date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
