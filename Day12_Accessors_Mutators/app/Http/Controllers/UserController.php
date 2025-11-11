<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::simplepaginate(10);
        return view("home", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adduser");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'useremail' => 'required|email',
            'usersalary' => 'required|numeric',
            'userdob' => 'required',
            'userpass' => 'required',
        ]);

        $user = User::create([
            'user_name' => $request->username,
            'email' => $request->useremail,
            'salary' => $request->usersalary,
            'dob' => $request->userdob,
            'password' => $request->userpass,
        ]);

        return redirect()->route('user.index')
            ->with('status', 'New User Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view("viewuser", compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::find($user->id);
        return view("updateuser", compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'useremail' => 'required|email',
            'usersalary' => 'required|numeric',
            'userdob' => 'required',
            'userpass' => 'required',
        ]);

        $user = User::where('id', $id)
            ->update([
                'user_name' => $request->username,
                'email' => $request->useremail,
                'salary' => $request->usersalary,
                'dob' => $request->userdob,
                'password' => $request->userpass,
            ]);

        return redirect()->route('user.index')
            ->with('status', 'Updated User  Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('user.index')
            ->with('status', 'User Data Deleted Successfully.');
    }
}
