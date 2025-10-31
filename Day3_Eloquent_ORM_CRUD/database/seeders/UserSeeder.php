<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/users.json');
        $users = collect(json_decode($json));

        $users->each(function ($users) {
            user::create([
                'name' => $users->name,
                'email' => $users->email,
                'age' => $users->age,
                'city' => $users->city,
            ]);
        });
    }
}
