@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User: {{ $user->name }}</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      @if (Auth::user()->id === $user->id)
        <a href="{{ route('user.changePassword') }}" class="btn btn-sm btn-outline-primary">Change My Password</a>
      @endif
      @if (Auth::user()->role === 'admin')
        <form action="{{ route('user.delete', $user->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-outline-danger" style="margin-left: 10px">Delete User</button>
        </form>
      @endif
    </div>

  </div>
  @if (Auth::user()->role === 'admin' && Auth::user()->id !== $user->id)
    <form action="{{ route('user.update', $user->id) }}" method="POST">
  @else
    <form action="{{ route('user.updateProfile') }}" method="POST">
  @endif
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select class="form-select" id="role" name="role" required>
        @if ((Auth::user()->role === 'admin' && Auth::user()->id !== $user->id) || Auth::user()->role === 'admin')
          <option value="admin" @if ($user->role === 'admin') selected @endif>Admin</option>
        @endif
        @if ((Auth::user()->role === 'admin' && Auth::user()->id !== $user->id) || Auth::user()->role === 'author')
          <option value="author" @if ($user->role === 'author') selected @endif>Author</option>
        @endif
        @if ((Auth::user()->role === 'admin' && Auth::user()->id !== $user->id) || Auth::user()->role === 'user' || Auth::user()->role === null)
          <option value="user" @if ($user->role === 'user' || $user->role === null) selected @endif>User</option>
        @endif
      </select>
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
    {!! method_field('PUT') !!}
  </form>
@endsection