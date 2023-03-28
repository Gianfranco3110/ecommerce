<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ColorSeeder extends Seeder
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
                'name' => 'Negro',
                'status' => 1
            ],
            [
                'name' => 'Rojo',
                'status' => 1
            ],
            [
                'name' => 'Verde',
                'status' => 1
            ],
            [
                'name' => 'Amarillo',
                'status' => 1
            ],
            [
                'name' => 'Azul',
                'status' => 1
            ],
            [
                'name' => 'Violeta',
                'status' => 1
            ],
            [
                'name' => 'Purpura',
                'status' => 1
            ],
            [
                'name' => 'Blanco',
                'status' => 1
            ],
            [
                'name' => 'Naranja',
                'status' => 1
            ],
            [
                'name' => 'Rosado',
                'status' => 1
            ],
            [
                'name' => 'Vinotinto',
                'status' => 1
            ],
            [
                'name' => 'Marron',
                'status' => 1
            ],
            [
                'name' => 'fuccia',
                'status' => 1
            ],[
                'name' => 'gris',
                'status' => 1
            ],[
                'name' => 'plateado',
                'status' => 1
            ],[
                'name' => 'dorado',
                'status' => 1
            ],[
                'name' => 'morado',
                'status' => 1
            ],

        ];
        DB::table('colors')->insert($data);
    }
}
