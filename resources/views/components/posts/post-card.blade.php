<div class="post-card__item">

  <div class="post-card__author">
    {{ $post->user->name }}
  </div>

  <a href="{{ route('show', $post->id) }}" class="post-card__link">
    <h4 class="post-card__title">{{ $post->title }}</h4>
  </a>

  <div class="post-card__content mb-10">
    {{ $post->body }}
  </div>

  <div class="post-card__meta">
    @if (count($post->tags))
      <ul class="tags">
        @foreach ($post->tags as $tag)
          <li class="tags__item">
            <a href="{{ route('feed', ['tag' => $tag->id]) }}"
              class="tags__link {{ $tag->id == request()->tag ? 'selected' : '' }}">
              {{ $tag->name }}
            </a>
          </li>
        @endforeach
      </ul>
    @endif
    <div class="post-card__created-at">
      {{ $post->created_at->diffForHumans() }}
    </div>
  </div>




</div>
