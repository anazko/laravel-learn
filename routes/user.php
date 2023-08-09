<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')
  ->name('user.')
  ->controller(PostController::class)
  ->middleware(['auth'])
  ->group(function() {

    Route::get('/posts', 'index')->name('posts');
    Route::get('/posts/{post}', 'show')->name('posts.show')->whereNumber('post');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit')->whereNumber('post');
    Route::post('/posts', 'store')->name('posts.store');
    Route::put('/posts/{post}', 'update')->name('posts.update')->whereNumber('post');

  });