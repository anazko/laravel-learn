<?php

use App\Http\Controllers\Admin\AdminSPAController;
use Illuminate\Support\Facades\Route;

//ADMIN
Route::controller(AdminSPAController::class)
  ->prefix('admin')
  ->name('admin.')
  ->middleware(['auth', 'admin'])
  ->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/{any}', 'index')->where('any', '.*')->name('index');
});