<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showUser(string $id)
    {
        //return "<h1>Welcome to Controller </h1>";
        // return view('users', ['id' => $id]);
        return view('users', compact('id'));
    }
    public function showHome()
    {
        return view('home');
    }
    public function showBlog()
    {
        return view('blog');
    }
}
