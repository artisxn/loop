<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kasey',
            'email' => 'kasey.culmback@gmail.com',
            'password' => Hash::make('Password123!'),
        ]);
    }
}
