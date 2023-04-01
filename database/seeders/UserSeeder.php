<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Admin',
            'last_name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('admin123'),
            'whatsapp' => "+58181651651",
            'status' => 1,
            'points'=>1
        ]);

        $user->assignRole('Super Admin');

        $user = User::create([
            'name' => 'supervisor',
            'last_name' => "supervisor",
            'email' => "supervisor@gmail.com",
            'password' => bcrypt('123456'),
            'whatsapp' => "+513265135",
            'status' => 1,
            'points'=>1
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Roberto',
            'last_name' => "Gomez",
            'email' => "roberto@gmail.com",
            'password' => bcrypt('123456'),
            'whatsapp' => "+456654564654",
            'status' => 1,
            'points'=>1
        ]);

        $user->assignRole('Cliente');


        $user = User::create([
            'name' => 'Richard',
            'last_name' => "Gonzales",
            'email' => "richard@gmail.com",
            'password' => bcrypt('123456'),
            'whatsapp' => "+456654564654",
            'status' => 1,
            'points'=>1
        ]);

        $user->assignRole('Cliente');
    }
}
