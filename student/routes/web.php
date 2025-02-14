<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//login
Route::get('/login', function () {
    return view('auth.login');
});

//register
Route::get('/register', function () {
    return view('auth.register');
});

//make account action
Route::post('/register', [AuthController::class, 'register']);

//login action
Route::post('/login', [AuthController::class, 'login']);

//logout action
Route::post('/logout', [AuthController::class, 'logout']);

//
Route::middleware(['student.auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/delete', [AuthController::class, 'deleteProfile'])->name('profile.delete');
    
});
