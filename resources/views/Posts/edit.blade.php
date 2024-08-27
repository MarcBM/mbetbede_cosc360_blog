@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post: <b>{{ $post->title }}</b></h1>
  </div>
  
  <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" id="content" name="content" rows="10" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
    {!! method_field('PUT') !!}
  </form>
@endsection