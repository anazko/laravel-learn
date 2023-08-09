<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
  ->name('admin.')
  ->middleware(['auth'])
  ->group(function() {

    Route::get('/', [UsersController::class, 'index'])->name('users');


  });