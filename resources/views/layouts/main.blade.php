<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  @stack('css')
  <title>Document</title>
</head>
<body>

  @include('templates.header')

  @hasSection ('secondary-menu')
    <div class="secondary-menu">
      @yield('secondary-menu')
    </div>
  @endif

  @include('templates.alert')
  
  @auth
    {{-- {{ Auth::user()->name }} --}}
  @endauth

  <div class="content container">
    @yield('content')
  </div>
  
  @stack('js')
</body>
</html>