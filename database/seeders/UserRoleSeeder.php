<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [
            ['name' => 'superAdmin'],
            ['name' => 'admin'],
            ['name' => 'staff']
        ];
        foreach ($user_roles as $user_role) {
            UserRole::create([
                'name'=>$user_role['name']
            ]);
        }
    }
}
