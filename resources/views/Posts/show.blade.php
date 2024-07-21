@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->content }}</p>
  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
  <br><br>
  <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>
@endsection