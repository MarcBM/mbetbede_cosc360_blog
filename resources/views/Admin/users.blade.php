@extends('layouts.dashboard')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Management</h1>
  </div>

  <div>
    <ul style="list-style: none">
      @foreach ($users as $user)
        <li>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h4>{{ $user->name }}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">Edit Details</a>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@endsection