<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'tadeu',
            'email' => 'tadeu@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
