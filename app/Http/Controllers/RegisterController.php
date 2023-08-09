<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

  public function index()
  {
    return view('register');
  }

  public function store(RegisterRequest $request)
  {
    $validated = $request->validated();
    $user = User::create($validated);

    if ($user) {
      Auth::login($user);
      return redirect(route('user.posts'));
    }

    return redirect(route('user.register'))->withErrors([
      'formError' => 'При создании пользователся произошла ошибка!',
    ]);
  }
}
