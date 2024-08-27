<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
