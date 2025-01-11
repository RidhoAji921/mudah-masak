<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthenticationController::class, 'loginView'])->middleware('guest')->name('login');
Route::get('/signup', [AuthenticationController::class, 'signupView'])->middleware('guest')->name('signup');

Route::post('/logout', [AuthenticationController::class, 'userLogout']);
Route::post('/login', [AuthenticationController::class, 'userLogin']);
Route::post('/signup', [AuthenticationController::class, 'userSignup']);

Route::get('/profil', [ProfilController::class, 'profilView'])->middleware('auth')->name('profil');