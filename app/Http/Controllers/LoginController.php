<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
  public function index() 
  {
    return view('login');
  }

  public function store(Request $request) 
  {
    $credentials = $request->only(['email', 'password']);
    
    if ( Auth::attempt($credentials) ) {
      alert("Welcome!");
      $request->session()->regenerate();
      return redirect()->intended(route('user.posts'));
    }

    return redirect(route("login"))->withErrors([
      'loginError' => 'Неверный логин или пароль'
    ]);
  }

  public function logout(Request $request) 
  { 
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('feed');
  }

}
