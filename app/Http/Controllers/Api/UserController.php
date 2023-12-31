<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
      $users = User::all();
      return new UserCollection($users);
    }

    public function show(User $user) {
      return new UserResource($user);
    }
}
