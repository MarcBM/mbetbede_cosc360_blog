@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>
  <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
  <ul>
    <li>ID: {{ $post->id }}</li>
    <li>Title: {{ $post->title }}</li>
    <li>Content: {{ $post->content }}</li>
  </ul>
@endsection