<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;     
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.register');
});


Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('/passport',PassportController::class)->names('passport');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('users.index');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::resource('/users',UserController::class)->names('users');


});

Route::middleware(['auth', 'check.passport'])->group(function () {
    Route::get('/passport/create', [PassportController::class, 'create'])->name('passport.create');
    Route::post('/passport', [PassportController::class, 'store'])->name('passport.store');
});    