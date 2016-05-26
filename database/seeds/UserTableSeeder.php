<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'     => 'Support',
            'email'    => 'support@laracademy.co',
            'password' => \Hash::make('password')
        ]);
    }
}
