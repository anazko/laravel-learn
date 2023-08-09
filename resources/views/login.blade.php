@extends('layouts.main')

@section('content')
    <form method="POST" action=" {{ route("login") }}" class="form auth-form">
      @csrf

      <h1 class="form__header">Login</h1>

      <div class="form-item">
        <label for="email" >Email:</label>
        <input type="text" name="email" id="email" autofocus />
      </div>

      <div class="form-item">
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" />
      </div>

      <div class="form-item">
        <button type="submit" class="btn">Login</button>
      </div>
     
      Dont't have a account? <a href="{{ route('register') }}">Register</a>
     

      

    </form>
@endsection