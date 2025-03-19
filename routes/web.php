<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PostController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');  // Default to login page
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Send verification email
    Route::get('/email/verify/send', [EmailVerificationController::class, 'sendVerificationEmail'])->name('email.verify.send');
    
    // Verify the email
    Route::get('/email/verify/{id}', [EmailVerificationController::class, 'verifyEmail'])->name('verification.verify');
});

Route::resource('posts', PostController::class)->middleware('auth');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


