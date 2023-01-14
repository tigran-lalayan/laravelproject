@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        @foreach($categories as $category)
            <h2>{{ $category->name }}</h2>
            <ul>
                @foreach($category->faqs as $faq)
                    <li><strong>{{ $faq->question }}</strong> - {{ $faq->answer }}</li>
                @endforeach
            </ul>
        @endforeach

    </div>
@endsection
