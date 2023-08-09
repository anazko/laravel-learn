

<div class="user-menu container">

  <ul class="user-menu__list">

    <li class="user-menu__item">
      <a href="{{ route('user.posts') }}" class="user-menu__link {{ active_link("user.posts") }}">
        Posts list
      </a>
    </li>

    <li class="user-menu__item">
      <a href="{{ route('user.posts.create') }}" class="user-menu__link {{ active_link("user.posts.create") }}">
        Create
      </a>
    </li>

  </ul>

</div>