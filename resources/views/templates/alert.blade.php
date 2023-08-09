
@if ( $alert = session()->pull('alert') )

  <div class="container alert">
    {{ $alert }}
  </div>

@endif


@if ($errors->any())

  <div class="alert alert-danger container">
      <ul class="alerts__list">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>

@endif