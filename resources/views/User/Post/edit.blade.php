@extends('layouts.user')

@section('user-content')

  <h2 class="content-header">Edit post</h2>

  <form action="{{ route("user.posts.update", $post->id) }}" method="POST" >
    @csrf
    @method('put')

    <div class="form-item">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" />
    </div>

    <div class="form-item">
      <label for="body">Body:</label>
      <textarea id="body" name="body">{{ $post->body }}</textarea>
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
            @foreach ($post->tags as $postTag)
              {{ $tag->id === $postTag->id ? 'checked' : '' }}  
            @endforeach           
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

    <button type="submit" class="btn">Update</button>

  </form>

@endsection
