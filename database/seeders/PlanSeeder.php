<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanSeeder extends Seeder
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
                'name' => 'Plan extra',
                'amount'=>1200,
                'cant' => 10,
                'user_id'=>3
            ],
            [
                'name' => 'Plan master',
                'amount'=>13000,
                'cant' => 30,
                'user_id'=>4
            ],



        ];
        DB::table('plans')->insert($data);
    }
}
