@extends('layouts.main')

@section('secondary-menu')
  @include('templates.usermenu')
@endsection

@section('content')
   @yield('user-content')
@endsection