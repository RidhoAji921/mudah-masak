<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthenticationController::class, 'loginView'])->middleware('guest')->name('login');
Route::get('/signup', [AuthenticationController::class, 'signupView'])->middleware('guest')->name('signup');

Route::post('/logout', [AuthenticationController::class, 'userLogout']);
Route::post('/login', [AuthenticationController::class, 'userLogin']);
Route::post('/signup', [AuthenticationController::class, 'userSignup']);

Route::get('/profile', [ProfileController::class, 'profileView'])->middleware('auth')->name('profile');

Route::get('/create-post', [PostController::class, 'createPostView'])->middleware('auth')->name('create-post');
Route::post('/create-post', [PostController::class, 'store'])->name('post.store');