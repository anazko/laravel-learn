@extends('layouts.main')

@section('content')
  <form action={{ route('tests.store') }} class="form" method="POST">
    @csrf

    <h1 class="form__header">Select tags</h1>

    <div class="select-tags__list">
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

    <div class="form-item">
      <button type="submit" class="btn">Create</button>
    </div>

  </form>
@endsection
