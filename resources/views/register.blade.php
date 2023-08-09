@extends('layouts.main')

@section('content')
    <form method="POST" action=" {{ route("register.store") }} " class="form auth-form">
      @csrf

      <h1 class="form__header">Registration</h1>

      <div class="form-item">
        <label for="name" >Name:</label>
        <input type="text" name="name" id="name" autofocus value="{{ old('name') }}" />
      </div>

      <div class="form-item">
        <label for="email" >Email:</label>
        <input type="text" name="email" id="email" autofocus value="{{ old('email') }}"/>
      </div>

      <div class="form-item">
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="{{ old('password') }}"/>
      </div>

      <div class="form-item">
        <button button type="submit" class="btn">Register</button>
      </div>

      Have a account? <a href="{{ route('login') }}">Login</a>

    </form>
@endsection