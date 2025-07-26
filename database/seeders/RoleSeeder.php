<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'super_admin', 'label' => 'سوپر ادمین', 'protected' => true],
            ['name' => 'admin', 'label' => 'ادمین', 'protected' => true],
            ['name' => 'seller', 'label' => 'فروشنده', 'protected' => true],
            ['name' => 'customer', 'label' => 'مشتری', 'protected' => true],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role['name'], 'guard_name' => 'web'],
                ['label' => $role['label'], 'protected' => $role['protected']]
            );
        }
    }
}
