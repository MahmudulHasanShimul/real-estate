<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //for Admin
            [
                'name'     => 'Admin',
                'username' => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'phone'    => '0161234',
                'role'     => 'admin',
                'status'   => 'active'
            ],


            //for Agent
            [
                'name'     => 'Agent',
                'username' => 'agent',
                'email'    => 'agent@gmail.com',
                'password' => Hash::make('123456'),
                'phone'    => '0171234',
                'role'     => 'agent',
                'status'   => 'active'
            ],


            //for User
            [
                'name'     => 'User',
                'username' => 'user',
                'email'    => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'phone'    => '0151234',
                'role'     => 'user',
                'status'   => 'active'
            ],
        ]);
    }
}
