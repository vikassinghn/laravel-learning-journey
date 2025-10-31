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
        // $users = User::find([2, 4], ['name', 'email']);
        // $users = User::count();
        // $users = User::min('age');
        //$users = User::max('age');
        // 

        // $users = User::whereCity('Pune')
        //     ->select('name', 'email as User Email')
        //     ->get();
        //->toSql();
        //->dd();
        //->ddRawSql();

        // $users = User::whereBetween('age', [20, 22])
        //     ->get();

        // $users = User::whereNotBetween('age', [20, 22])
        // ->get();

        //return $users;
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
        // $user = new User;
        // $user->name = $request->username;
        // $user->email = $request->useremail;
        // $user->age = $request->userage;
        // $user->city = $request->usercity;

        // $user->save();


        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->useremail,
            'age' => $request->userage,
            'city' => $request->usercity,
        ]);
        return redirect()->route('user.index')
            ->with('status', 'New User Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $users = User::find($user);
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
        // $user = User::find($id);

        // $user->name = $request->username;
        // $user->email = $request->useremail;
        // $user->age = $request->userage;
        // $user->city = $request->usercity;

        // $user->save();

        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',
        ]);

        $user = User::where('id', $id)
            ->update([
                'name' => $request->username,
                'email' => $request->useremail,
                'age' => $request->userage,
                'city' => $request->usercity,
            ]);

        return redirect()->route('user.index')
            ->with('status', 'User data updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();

        // USer::destroy($id);

        return redirect()->route('user.index')
            ->with('status', 'User data Deleted Successfully.');
    }
}
