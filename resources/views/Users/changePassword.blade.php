@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Change Password: {{ $user->name }}</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      <a href="{{ route('user.profile') }}" class="btn btn-sm btn-outline-primary">Cancel</a>
    </div>

  </div>
  @if (Auth::user()->id !== $user->id)
    <div class="alert alert-danger" role="alert">
      You are not authorized to change this user's password.
    </div>
  @else
    <form action="{{ route('user.updatePassword') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="password" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="password" name="password" value="" required>
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" class="form-control" id="new_password" name="new_password" value="" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" required>
      </div>
      <button type="submit" class="btn btn-outline-primary">Submit</button>
      {!! method_field('PUT') !!}
    </form>
  @endif
@endsection