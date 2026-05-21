<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class , 'index'])->name('dashboard'); 

//users route
Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UsersController::class , 'index'])->name('users.index');   
    Route::get('/create', [UsersController::class , 'create'])->name('users.create');
    Route::post('/', [UsersController::class , 'store'])->name('users.store');
    Route::delete('/{id}', [UsersController::class , 'destroy'])->name('users.destroy');
    Route::get('/{id}/edit', [UsersController::class , 'edit'])->name('users.edit');
    Route::put('/{id}/update', [UsersController::class , 'update'])->name('users.update');
});

// Route::middleware('auth')->prefix('users')->group(function() {
//     Route::get('/', [UsersController::class , 'index'])->name('users.index');   
//     Route::get('/create', [UsersController::class , 'create'])->name('users.create'); 
//     Route::post('/', [UsersController::class , 'store'])->name('users.store');
//     Route::delete('/{id}', [UsersController::class , 'destroy'])->name('users.destroy');
//     Route::get('/{id}/edit', [UsersController::class , 'edit'])->name('users.edit');
//     Route::put('/{id}/update', [UsersController::class , 'update'])->name('users.update');
// });

//login route
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//     Route::post('/login', [AuthController::class, 'login']);
// });

//logout route
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');