@extends('layouts.main')

@section('content')

  @if( isset($tag) )
    <h2 class="content-header">
      Posts with tag: {{ $tag->name }}
    </h2>
  @endif

  @foreach ($posts as $post)
    <x-posts.post-card :$post />
  @endforeach

@endsection
