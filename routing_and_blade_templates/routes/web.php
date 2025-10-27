<?php

use Illuminate\Support\Facades\Route;
use Phiki\Grammar\Injections\Prefix;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestingController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('/post', function () {
//     return view('post');

//     // return "<h1>Post Page:</h1>";
// })->name('post');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');


// Route::get('ID/{id?}', function ($id = null) {
//     if ($id) {
//         echo 'ID: ' . $id;
//     } else {
//         echo "No id Found!";
//     }
// })->whereNumber('id');

// Route::get('user/{name?}', function ($name = 'TutorialsPoint') {
//     return $name;
// });



// Route::view('/post', 'post');

// Route::get('/hello', function () {
//     return view('post');
// });

// Route::get('/post/firstpost', function () {
//     return view('firstpost');
// });

// Route::get('ID/{id?}/Comment/{comment?}', function ($id = null, $comment = null) {
//     if ($id) {
//         echo "ID : $id Comment: $comment";
//     } else {
//         echo "NO Id found:";
//     }
// })->where('id', '[0-9]+')->whereAlpha('comment');


// Route::get('/test', function () {
//     return view('test');
// });

// // //Redirecting
// // Route::redirect('/about', '/test');

// Route::fallback(function () {
//     return "<h1>Page not found!</h1>";
// });


// Route::get('/users', function () {
//     $names = [
//         1 => ['name' => 'Amitabh', 'phone' => '9123456789', 'city' => 'Goa'],
//         2 => ['name' => 'Salman', 'phone' => '9123456789', 'city' => 'Delhi'],
//         3 => ['name' => 'Sunny', 'phone' => '9123456789', 'city' => 'Mumbai'],
//         4 => ['name' => 'Akshay', 'phone' => '9123456789', 'city' => 'Agra'],
//     ];
//     return view('users', [
//         'user' => $names,
//         'city' => 'Delhi'
//     ]);
// });

//CONTROLLER


// Route::get('/', [PageController::class, 'showHome'])->name('home');
// Route::get('/user/{id}', [PageController::class, 'showUser'])->name('users');
// Route::get('/blog', [PageController::class, 'showBlog'])->name('blog');

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'showHome')->name('home');
    Route::get('/user/{id}', 'showUser')->name('users');
    Route::get('/blog', 'showBlog')->name('blog');
});
Route::get('/test', TestingController::class);
