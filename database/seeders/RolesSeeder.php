<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $roles = [
                [
                    'name'=>"Super Admin",
                    'slug'=> "Super Admin"
                ],[
                    'name'=>"Admin",
                    'slug'=> "Admin"
                ],[
                    'name'=>"Cliente",
                    'slug'=> "Cliente"
                ]
                ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
