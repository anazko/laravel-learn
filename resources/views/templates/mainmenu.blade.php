<ul class="main-menu">
  @auth
    <li>
      <a class="main-menu__link" href="{{ route('user.posts') }}">My posts</a>
    </li>
    <li>
      <a class="main-menu__link" href="{{ route('logout') }}">Logout</a>
    </li>
  @endauth
  @guest
    <li>
      <a class="main-menu__link" href="{{ route('login') }}">Login</a>
    </li>  
  @endguest
</ul>