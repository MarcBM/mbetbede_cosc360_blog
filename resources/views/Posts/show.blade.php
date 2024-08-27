@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $post->title }}</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      @if (Auth::user()->role === 'admin' || Auth::user()->id === $post->user_id)
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary" style="margin-right: 10px">Edit</a>
        @if (Auth::user()->role === 'admin')
          <form action="{{ route('admin.deletePost', $post->id) }}" method="POST">
        @else
          <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @endif
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
      @endif
    </div>

  </div>
  <p>{{ $post->content }}</p>
@endsection