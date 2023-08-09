@extends('layouts.user')

@section('user-content')

  <h2 class="content-header">Create new post</h2>

  <form action="{{ route("user.posts.store") }}" method="POST" >
    @csrf

    <div class="form-item">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="{{ old('title') }}" />
    </div>

    <div class="form-item">
      <label for="body">Body:</label>
      <textarea id="body" name="body">{{ old('body') }}</textarea>
    </div>

    <div class="select-tags__list mb-20">
      <label>Tags:</label>
      @foreach ($tags as $tag)
        <div class="select-tabs__item">
          <input 
            type="checkbox" 
            name="tags[]" 
            id="tag-{{ $tag->id }}" 
            value="{{ $tag->id }}"
            class="select-tags__checkbox" 
          />
          <label 
            for="tag-{{ $tag->id }}" 
            class="select-tags__label">{{ $tag->name }}
          </label>
        </div>
      @endforeach
    </div>

    {{-- <input id="body" type="hidden" name="body">
    <trix-editor input="body"></trix-editor> --}}

    <button type="submit" class="btn">Create</button>

  </form>

@endsection



{{-- 
  @push('css')
    <link rel="stylesheet" href="/css/trix.css">
@endpush

@push('js')
    <script src="/js/trix.js"></script>
@endpush
--}}