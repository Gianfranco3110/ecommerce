<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DimensionsSeeder extends Seeder
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
                'name' => 'Alto',
                'status' => 1
            ],
            [
                'name' => 'Ancho Por Alto',
                'status' => 1
            ],
            [
                'name' => 'Pequeño',
                'status' => 1
            ]

        ];
        DB::table('dimensiones')->insert($data);
    }
}
