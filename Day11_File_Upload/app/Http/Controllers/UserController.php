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
        $users = User::get();
        return view('file-upload', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:3000'
        ]);
        $file = $request->file('photo');

        // $extension = $file->getClientOriginalExtension();

        // $extension = $file->extension();
        // return $extension;

        // $extension = $file->hashName();
        // return $extension;

        $path = $request->file('photo')->store('image', 'public');

        User::create([
            'file_name' => $path,
        ]);

        // $fileName = time() . '_' . $file->getClientOriginalName();
        // $path = $request->file('photo')->storeAs('image', $fileName, 'public');

        // return $path;

        return redirect()->route('user.index')->with('status', 'User image Uploaded Successfully.');

        // $extension = $file->getSize();
        // return $extension;
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
        $user = User::find($id);

        return view('file-update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        if ($request->hasFile('photo')) {

            $image_path = public_path("storage/") . $user->file_name;

            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $path = $request->photo->store('image', 'public');

            $user->file_name = $path;
            $user->save();

            return redirect()->route('user.index')->with('status', 'User image Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        $image_path = public_path("storage/") . $user->file_name;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        return redirect()->route('user.index')->with('status', 'User image Deleted Successfully.');
    }
}
