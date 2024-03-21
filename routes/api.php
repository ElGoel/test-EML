<?php

use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (CreateUserRequest $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UsersController::class);