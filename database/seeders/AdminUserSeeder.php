<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id'  => 2,
        ]);

        User::create([
            'name'     => 'User',
            'email'    => 'user@admin.com',
            'password' => bcrypt('password'),
            'role_id'  => 1,
        ]);
    }
}
