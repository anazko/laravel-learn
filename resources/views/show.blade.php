@extends('layouts.main')

@section('content')
<div class="post__item">

  <a href="{{ url()->previous() }}">Back</a>
  
  <div class="post__author">
    {{ $post->user->name }}
  </div>

  <h4 class="post__title">{{ $post->title }}</h4>

  <div class="post__content">
    {{ $post->body }}
  </div>

</div>
@endsection

