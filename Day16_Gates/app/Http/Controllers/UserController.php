<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function loginPage()
    {
        if (Auth::id()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboardPage()
    {
        //Gate::authorize('isAdmin');

        return view('dashboard');

        // if (Gate::allows('isAdmin')) {
        //     //return "Hello you are admin.";
        //     return view('dashboard');
        // } else {
        //     return "Access Denied.";
        // }
    }

    public function ViewProfile(int $userid)
    {
        Gate::authorize('view-profile', $userid);
        $user = User::findorfail($userid);
        return view('profile', compact('user'));


        // if (Gate::allows('view-profile', $userid)) {
        //     $user = User::findorfail($userid);
        //     //return $user;

        //     return view('profile', compact('user'));
        // } else {
        //     // return redirect()->route('dashboard');
        //     abort(403);
        // }
    }

    public function ViewPost()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        //return $posts;
        return view('posts', compact('posts'));
    }

    public function UpdatePost($postid)
    {
        $post = Post::find($postid);
        $targetUser = $post->user_id;
        Gate::authorize('update-post', $targetUser);
        return $post;
    }
}
