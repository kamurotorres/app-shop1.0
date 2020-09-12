<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario por defecto
        User::create([
            'name'=> 'Kevin',
            'email' => 'kevin@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => true
        ]);
    }
}
