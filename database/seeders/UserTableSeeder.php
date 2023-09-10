<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Model\User;
use DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'status'=>1,
            'password'=>bcrypt('password123'),
        ]);
    }
}