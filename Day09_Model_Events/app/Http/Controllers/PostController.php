<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::find(1);
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_title = "This is another testing";

        Post::create([
            'title' => $post_title,
            //'slug' => $post_slug,
            'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam, atque.",
            'user_id' => 2,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
