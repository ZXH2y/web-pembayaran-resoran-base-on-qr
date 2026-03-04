<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['role_name' => 'admin', 'description' => 'Administrator with full access'],
            ['role_name' => 'waiter', 'description' => 'Waiter responsible for taking orders and serving customers'],
            ['role_name' => 'chef', 'description' => 'Chef responsible for preparing food'],
            ['role_name' => 'cashier', 'description' => 'Cashier responsible for handling payments'],
        ];
        DB::table('roles')->insert($roles);
    }
    
}
