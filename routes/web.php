<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('posts', PostController::class);
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::get('/user/editProfile', [UserController::class, 'editProfile']);
    Route::put('/user/updateProfile', [UserController::class, 'updateProfile']);
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/posts', [AdminController::class, 'posts']);
Route::get('/admin/users', [AdminController::class, 'users']);
Route::get('/user/{id}/edit', [UserController::class, 'editUser']);
Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser']);


Auth::routes();