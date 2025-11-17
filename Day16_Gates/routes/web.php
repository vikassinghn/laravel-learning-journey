<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'loginPage'])->name('home');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboardPage'])
    ->name('dashboard');
//->can('isAdmin');

// Route::get('/dashboard', [UserController::class, 'dashboardPage'])
//     ->name('dashboard')->middleware('can:isAdmin');

Route::get('/profile/{id}', [UserController::class, 'ViewProfile'])->name('profile.show');

Route::get('/post{id}', [UserController::class, 'ViewPost'])->name('post.show');

Route::get('/single-post/{id}', [UserController::class, 'UpdatePost'])->name('post.update');
