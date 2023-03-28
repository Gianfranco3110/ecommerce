<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubCategorySeeder extends Seeder
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
                'name' => 'Botella',
                'categoria_id'=>1,
                'status' => 1
            ],
            [
                'name' => 'Plastico',
                'categoria_id'=>1,
                'status' => 1
            ],
            [
                'name' => 'Jens',
                'categoria_id' => 2,
                'status' => 1
            ],[
                'name' => 'Cuero',
                'categoria_id' => 2,
                'status' => 1
            ]

        ];
        DB::table('sub_categorias')->insert($data);
    }
}
