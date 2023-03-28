<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Embase',
                'status' => 1
            ],
            [
                'name' => 'Pantalone',
                'status' => 1
            ],
            [
                'name' => 'Tegnologia',
                'status' => 1
            ]

        ];
        DB::table('categorias')->insert($data);
    }
}
