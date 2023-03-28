<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SizeSeeder extends Seeder
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
                'name' => 'M',
                'status' => 1
            ],
            [
                'name' => 'S',
                'status' => 1
            ],
            [
                'name' => 'L',
                'status' => 1
            ],
            [
                'name' => 'X',
                'status' => 1
            ],
            [
                'name' => 'XL',
                'status' => 1
            ],
            [
                'name' => 'XXL',
                'status' => 1
            ],[
                'name' => 'XS',
                'status' => 1
            ]

        ];
        DB::table('sizes')->insert($data);
    }
}
