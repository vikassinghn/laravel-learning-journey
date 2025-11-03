<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->email()
            ]);
        }


        // $json = File::get(path: 'database/json/students.json');
        // $students = collect(json_decode($json));
        // $students = collect(
        //     [
        //         [
        //             'name' => 'Yahoo Baba',
        //             'email' => 'yahoobaba@gmail.com'
        //         ],
        //         [
        //             'name' => 'Salman Khan',
        //             'email' => 'salman@gmail.com'
        //         ],
        //         [
        //             'name' => 'Amitabh Bachan',
        //             'email' => 'amitabh@gmail.com'
        //         ]
        //     ]
        // );
        // $students->each(function ($student) {
        //     //student::insert($student);
        //     student::create([
        //         'name' => $student->name,
        //         'email' => $student->email
        //     ]);
        // });
    }
}
