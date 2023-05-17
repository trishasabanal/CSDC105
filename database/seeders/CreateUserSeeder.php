<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['fname'=>'Admin',
            'email'=>'tsabanal@gbox.adnu.edu.ph',
            'password'=> bcrypt('password123'),
            'role'=> 1
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}