<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::view('/','dashboard');
Route::view('/login','login');

Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UsersController::class , 'index'])->name('users.index');    
    Route::get('/create', [UsersController::class , 'create'])->name('users.create');
    Route::post('/', [UsersController::class , 'store'])->name('users.store');
    Route::delete('/{id}', [UsersController::class , 'destroy'])->name('users.destroy');
    Route::get('/{id}/edit', [UsersController::class , 'edit'])->name('users.edit');
    Route::put('/{id}', [UsersController::class , 'update'])->name('users.update');
});