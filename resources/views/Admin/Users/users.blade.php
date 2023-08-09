@extends('layouts.user')

@section('user-content')

  <h2 class="content-heaeder">Users</h2>

  {{-- @php
    dd($posts[0]);
  @endphp --}}
  <ul style="list-style: none;">
  @foreach ($users as $user)
    <li>{{ $user->name }}: {{ $user->email }}</li>
  @endforeach
  </ul>


@endsection