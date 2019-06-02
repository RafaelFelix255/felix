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
        User::create([
            'name'      =>'Rafael Ribeiro Felix',
            'email'     =>'rafaelribeirofelix@live.com',
            'password'  =>bcrypt('123456'),
        ]);

        User::create([
            'name'      =>'Valdemir Ribeiro Felix',
            'email'     =>'milgasfelix@hotmail.com',
            'password'  =>bcrypt('123456'),
        ]);
    }
}
