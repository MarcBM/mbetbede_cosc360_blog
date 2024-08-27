@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Blog Posts</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-secondary">Create Post</a>
      </div>
    </div>
  </div>

  <div>
    <ul>
      @foreach ($posts as $post)
        <li>
          <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
          <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </li>
      @endforeach
    </ul>
  </div>
@endsection