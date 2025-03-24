<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users= [
          ['name'=>'super admin','email'=>'superadmin@gmail.com','user_role'=>1,'password'=>'super@123'],
          ['name'=>'admin','email'=>'admin@gmail.com','user_role'=>2,'password'=>'admin@123'],
          ['name'=>'staff','email'=>'staff@gmail.com','user_role'=>3,'password'=>'staff@123'],
        ];
        foreach ($users as $user){
            User::create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'user_role'=>$user['user_role'],
                'password'=>Hash::make($user['password'])
            ]);
        }
    }
}
