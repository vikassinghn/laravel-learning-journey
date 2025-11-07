<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $test = Test::find(3);
        // return $test->meta_data;

        // $test = Test::where('meta_data->name', 'Yuvraj Singh')->get();

        $test = Test::whereJsonContains('meta_data->name', 'Viraj Singh')->get();
        return $test;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $test = new Test;
        // $test->meta_data = [
        //     'name' => 'Vikas Singh',
        //     'email' => 'vikas@gmail.com',
        //     'mobile_number' => '9875432210'
        // ];
        // $test->save();

        // $test = Test::create([
        //     'meta_data' => [
        //         'name' => 'Yuvraj Singh',
        //         'email' => 'yuvraj@gmail.com',
        //         'mobile_number' => '9745367210',
        //         'address' => [
        //             'street' => '#123 KK Road',
        //             'city' => 'Mumbai',
        //             'country' => 'India'
        //         ]
        //     ]
        // ]);

        $test = Test::where('id', 2)->update([
            'meta_data->email' => 'viraj@gmail.com'
        ]);

        // $test = Test::find(3);
        // $test->meta_data['name'] = 'John Abraham';
        // $test->save();

        // $test = Test::find(2);
        // $test->meta_data = collect($test->meta_data)->forget('email');
        // $test->save();
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
