<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/users', function () {
    return response()->json([
        'message' => 'API is working'
    ]);
});

Route::get('student',[StudentController::class,"list"]);