@extends('layouts.app')

@section('content')
  <h1>Edit Post: {{ $post->title }}</h1>
  <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    {!! method_field('PUT') !!}
  </form>
@endsection