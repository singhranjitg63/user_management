<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Mail\MyEmail;

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
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/mail',function(){
    return view('mail.name')->with('name','Ranjit Singh');
})->name('mail');
Route::get('/mailsend',function(){
   $name = 'Ranjit Singh';
   Mail::to('Ranjit@gmail.com')->send(new MyEmail($name));
});