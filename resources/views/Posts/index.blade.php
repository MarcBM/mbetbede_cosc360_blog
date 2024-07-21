@extends('layouts.app')

@section('content')
  <h1>Blog Posts</h1>
  <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>

  {{--<ul>
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
  </ul>--}}
@endsection