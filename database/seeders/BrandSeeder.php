<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BrandSeeder extends Seeder
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
                'name' => 'Apple',
                'status' => 1
            ],
            [
                'name' => 'Microsoft',
                'status' => 1
            ],
            [
                'name' => 'Coca-Cola',
                'status' => 1
            ],[
                'name' => 'IBM',
                'status' => 1
            ],[
                'name' => 'Google',
                'status' => 1
            ],[
                'name' => 'McDonald’s',
                'status' => 1
            ],[
                'name' => 'General Electric',
                'status' => 1
            ],[
                'name' => 'Intel',
                'status' => 1
            ],[
                'name' => 'Samsung',
                'status' => 1
            ],[
                'name' => 'Louis Vuitton',
                'status' => 1
            ],[
                'name' => 'BMW',
                'status' => 1
            ],[
                'name' => 'Cisco',
                'status' => 1
            ],[
                'name' => 'Oracle',
                'status' => 1
            ],[
                'name' => 'Toyota',
                'status' => 1
            ],[
                'name' => 'AT&T',
                'status' => 1
            ],[
                'name' => 'Mercedes-Benz',
                'status' => 1
            ],[
                'name' => 'Disney',
                'status' => 1
            ],[
                'name' => 'Wal-Mart',
                'status' => 1
            ],[
                'name' => 'Budweiser',
                'status' => 1
            ],[
                'name' => 'Honda',
                'status' => 1
            ],[
                'name' => 'Hewlett-Packard',
                'status' => 1
            ],[
                'name' => 'HSBC',
                'status' => 1
            ],[
                'name' => 'Amazon.Com',
                'status' => 1
            ],[
                'name' => 'Visa',
                'status' => 1
            ],[
                'name' => 'Siemens',
                'status' => 1
            ],[
                'name' => 'NIKE',
                'status' => 1
            ],[
                'name' => 'Nestle',
                'status' => 1
            ],[
                'name' => 'Gucci',
                'status' => 1
            ],[
                'name' => 'Frito-Lay',
                'status' => 1
            ],[
                'name' => 'IKEA',
                'status' => 1
            ],[
                'name' => 'Danone',
                'status' => 1
            ],[
                'name' => 'Audi',
                'status' => 1
            ],[
                'name' => 'Ford',
                'status' => 1
            ],[
                'name' => 'Coach',
                'status' => 1
            ],[
                'name' => 'Fox',
                'status' => 1
            ],[
                'name' => 'Zara',
                'status' => 1
            ],[
                'name' => 'Kraft',
                'status' => 1
            ],[
                'name' => 'Adidas',
                'status' => 1
            ],[
                'name' => 'Volkswagen',
                'status' => 1
            ],[
                'name' => 'Nintendo',
                'status' => 1
            ],[
                'name' => 'Colgate',
                'status' => 1
            ],[
                'name' => 'Rolex',
                'status' => 1
            ],[
                'name' => 'Prada',
                'status' => 1
            ],[
                'name' => 'Red Bull',
                'status' => 1
            ],[
                'name' => 'Nokia',
                'status' => 1
            ],[
                'name' => 'Redmin',
                'status' => 1
            ]

        ];
        DB::table('brands')->insert($data);
    }
}
