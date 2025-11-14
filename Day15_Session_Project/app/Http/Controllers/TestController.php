<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $value = session('name');
        return view('welcome', compact('value'));

        // $value = session()->all();

        // $value = session()->only(['name']);

        // $value = session()->except(['class', '_previous']);
        // echo "<pre>";
        // print_r($value);
        // echo "<pre>";

        // if (session()->has('name')) {
        //     $value = session()->get('name');
        //     echo $value;
        // } else {
        //     echo "Name key doesn't Exist.";
        // }

        // // $value = session()->get('name');
        // $value = session('name', "Hello");
        // echo $value;
    }

    // public function storeSession()
    // {
    //     session(['name' => 'VikasSingh']);
    //     session()->put("class", "Btech");

    //     return redirect('/');
    // }

    public function storeSession(Request $request)
    {
        // session(['name' => 'VikasSingh']);
        // $request->session()->put("class", "Btech");

        session([
            'name' => 'VikasSingh',
            'class' => 'Btech'
        ]);

        session()->flash('status', 'Session Saved Successfully.');

        // session()->increment('count', $incrementBy = 2);
        //session()->decrement('count', $decrementBy = 2);

        //session()->regenerate();

        return redirect('/');
    }

    public function deleteSession()
    {
        // session()->forget(['name', 'class']);

        // session()->flush();

        session()->invalidate();
        return redirect('/');
    }
}
