@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Blog!</h1>
        @guest
            <p>Please log in to read the contents of posts!</p>
        @endguest
    </div>

    <div>
        <ul style="list-style: none">
        @foreach ($posts as $post)
            <li>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                @guest
                    <h4>{{ $post->title }}</h4>
                @else
                    <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                @endguest
            </div>
            </li>
        @endforeach
        </ul>
    </div>
    @endsection