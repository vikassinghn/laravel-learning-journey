<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
// use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Closure;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')
            ->paginate(10);
        //->where('city', '=', 'Delhi')
        //->orWhere('age', '>', 30)
        //->whereBetween('age', [18, 30])
        //->whereNotBetween('age', [18, 30])
        //->whereNull('email')
        //->whereDate('created_at', '2025-10-06')
        //->whereMonth('created_at', '10')
        //->whereDay('created_at', '6')
        //->whereYear('created_at', '2025')
        //->whereTime('created_at', '10:45:24')
        //->whereIn('id', [2, 4])
        // ->orderBy('name')
        // ->orderBy('age', 'desc')
        //->limit(2)
        //->offset(3)
        //->take(2)

        //->skip(3)
        // ->get();
        //->count();
        //->max('age')
        //->sum('age');
        //->inRandomOrder()
        //->first();
        //->latest();
        //->oldest();

        //$users = DB::table('users')->find(4);
        return view('allusers', ['data' => $users]);

        //return $users;
        //dd($users);
    }
    public function singleUser(string $id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        return view('user', ['data' => $user]);
    }

    public function addUser(UserRequest $req)
    {
        $req->validate([
            // 'username' => ['required', new Uppercase],
            'username' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                if (strtoupper($value) != $value) {
                    $fail('The :attrbute must be uppercase.');
                }
            }],
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required',
        ], [
            //     "username.required" => 'User Name is required',
            //     "useremail.required" => 'User Email is required',
            //     "userage.required" => 'User Age is required',
            //     "usercity.required" => 'User City is required',
        ]);
        $user = DB::table('users')
            ->insert([

                'name' => $req->username,
                'email' => $req->useremail,
                'age'  => $req->userage,
                'city' => $req->usercity,


            ]);
        if ($user) {
            return redirect()->route('home');
        } else {
            echo "<h1>Data not Added.</h1>";
        }
    }

    public function updatePage(string $id)
    {
        // $user = DB::table('users')->where('id', $id)->get();
        $user = DB::table('users')->find($id);
        return view('updateuser', ['data' => $user]);
    }

    public function updateUser(Request $req, $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $req->username,
                'email' => $req->useremail,
                'age'  => $req->userage,
                'city' => $req->usercity,

            ]);
        if ($user) {
            return redirect()->route('home');
        } else {
            echo "<h1>Data not Updated.</h1>";
        }
    }

    public function deleteUser(string $id)
    {
        $user = Db::table('users')
            ->where('id', $id)
            ->delete();
        if ($user) {
            return redirect()->route('home');
        }
    }
}
