<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/feed');
Route::get('/feed', [FeedController::class, 'index'])->name('feed');
Route::get('/posts/{post}', [FeedController::class, 'show'])->name('show');

// Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
// Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

// AUTH
Route::controller(LoginController::class)->group(function() {
  Route::get('/login', 'index')->name('login')->middleware('guest');
  Route::get('/logout', 'logout')->name('logout');
  Route::post('/login', 'store')->name('login.store');
});
Route::controller(RegisterController::class)->group(function() {
  Route::get('/register', 'index')->name('register')->middleware('guest');
  Route::post('/register', 'store')->name('register.store');
});

// Эксперименты
Route::controller(TestsController::class)->group(function() {
  Route::get('/tests/create', 'create')->name('tests.create');
  Route::post('/tests', 'store')->name('tests.store');
}); 