<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'user']);
        Role::create(['name' => 'retailer']);
        Role::create(['name' => 'royal-user']);
        Role::create(['name' => 'wholesaler']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'manager']);
        // Role::create(['name' => 'editor']);
    }
}
