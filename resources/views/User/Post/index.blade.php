@extends('layouts.user')

@section('user-content')

  <h2 class="content-header">My posts</h2>

  {{-- @php
    dd($posts[0]);
  @endphp --}}

  @foreach ($posts as $post)
    <x-posts.my-post-card :$post />
  @endforeach

@endsection