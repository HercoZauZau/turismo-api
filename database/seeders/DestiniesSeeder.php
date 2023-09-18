<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DestiniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinos')->insert([
            [
                'name' => 'Ponta Malongane',
                'province_id' => 1, 
                'image_url' => 'https://i.pinimg.com/564x/fe/86/0e/fe860e96538a5be157e7f42677e14b70.jpg',
            ],
            [
                'name' => 'Inharime',
                'province_id' => 2, 
                'image_url' => 'https://i.pinimg.com/564x/16/da/65/16da65c7e70dc69302c0cc93f447376a.jpg',
            ],
            [
                'name' => 'Vilanculos',
                'province_id' => 2, 
                'image_url' => 'https://i.pinimg.com/564x/3e/d8/06/3ed80657c6f12b65d95d641e21f81f0a.jpg',
            ],
         
        ]);
    }
}
