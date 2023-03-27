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
    }
}
