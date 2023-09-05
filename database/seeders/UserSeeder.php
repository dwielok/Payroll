<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => Hash::make('12345678'),
                'role' => 0,
            ],
            [
                'name' => 'Super User',
                'email' => 'superuser@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 1,
            ]
        ]);
    }
}
