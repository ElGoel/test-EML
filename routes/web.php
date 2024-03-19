<?php

// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users', [UserController::class, 'index']);

// Route::post('/users/{id}', [UserController::class, 'show']);

// Route::put('/users/{id}', [UserController::class,'update']);

// Route::get('/users/{id}', [UserController::class, 'destroy']);

// Route::post('/users', [UserController::class, 'store']);
