<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin-Only', 'slug' => 'admin-only'],
            ['name' => 'Shared-Access', 'slug' => 'shared-access'],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::updateOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
