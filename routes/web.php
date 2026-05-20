<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

 Route::get('/', [DashboardController::class , 'index'])->name('dashboard')->middleware('auth'); 
//users route
Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UsersController::class , 'index'])->name('users.index')->middleware('auth');   
    Route::get('/create', [UsersController::class , 'create'])->name('users.create');
    Route::post('/', [UsersController::class , 'store'])->name('users.store');
    Route::delete('/{id}', [UsersController::class , 'destroy'])->name('users.destroy');
    Route::get('/{id}/edit', [UsersController::class , 'edit'])->name('users.edit');
    Route::put('/{id}/update', [UsersController::class , 'update'])->name('users.update');
});

//login logout route
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');