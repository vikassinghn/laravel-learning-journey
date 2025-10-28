<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'showStudents']);

Route::resource('users', UserController::class)
    // ->only
    // // ->except
    // ([
    //     'create',
    //     'update',
    //     'show'
    // ])
    // ->names([
    //     'create' => 'users.build',
    //     'show' => 'users.view'
    // ])
;

Route::resource('users.comments', CommentController::class)->shallow();
