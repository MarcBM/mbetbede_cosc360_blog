@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $user->name }}</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      <a href="{{ route('user.editProfile') }}" class="btn btn-sm btn-outline-primary" style="margin-right: 10px">Edit My Profile</a>
      <a href="{{ route('user.changePassword') }}" class="btn btn-sm btn-outline-secondary">Change My Password</a>
    </div>

  </div>
  <p>Role: <b>{{ $user->role }}</b></p>
  <p>email: <b>{{ $user->email }}</b></p>
@endsection