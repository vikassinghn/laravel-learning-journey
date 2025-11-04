<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('post')->find(2);

        // $users = User::has(
        //     "post",
        //     '>=',
        //     2
        // )->with('post')->get();

        $users = User::select(['name', 'email'])
            ->withCount('post')
            ->get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $post = new Post([
        //     'title' => 'News Title - Test',
        //     'description' => 'Just Testing....'
        // ]);

        $user = User::find(3);

        // $user->post()->create([
        //     'title' => 'News Title 2 - Test',
        //     'description' => 'Just Testing 2 ....'
        // ]);

        $user->post()->createMany([
            [
                'title' => 'News Title 3 - Test',
                'description' => 'Just Testing 3 ....'
            ],
            [
                'title' => 'News Title 4 - Test',
                'description' => 'Just Testing 4 ....'
            ]
        ]);

        // $user->post()->save($post);
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
