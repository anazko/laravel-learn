<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

//ADMIN
Route::controller(AdminController::class)
  ->prefix('admin')
  ->name('admin.')
  ->middleware(['auth', 'admin'])
  ->group(function() {
    Route::get('/', 'index')->name('index');
});