<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            [
                'name' => 'Maputo',
                'description' => 'Capital city of Mozambique.',
                'image_url' => 'https://i.pinimg.com/564x/48/f2/f9/48f2f96378923fa7b3be2918b9fb86c3.jpg'
            ],
            [
                'name' => 'Gaza',
                'description' => 'Located in the southern part of the country.',
                'image_url' => 'https://i.pinimg.com/564x/47/64/2d/47642d43312621452cb5d49c76f50723.jpg'
            ],
            [
                'name' => 'Inhambane',
                'description' => 'Known for its beautiful beaches and coconut plantations.',
                'image_url' => 'https://i.pinimg.com/564x/76/8f/67/768f67c7194ccc58bbb7be6ed424e6b9.jpg'
            ],
            [
                'name' => 'Sofala',
                'description' => 'Home to the port city of Beira, a major trade hub.',
                'image_url' => ''
            ],
            [
                'name' => 'Manica',
                'description' => 'Known for its agricultural and mining activities.',
                'image_url' => ''
            ],
            [
                'name' => 'Tete',
                'description' => 'Rich in mineral resources and scenic landscapes.',
                'image_url' => ''
            ],
            [
                'name' => 'Zambezia',
                'description' => 'One of the most populous provinces in Mozambique.',
                'image_url' => ''
            ],
            [
                'name' => 'Nampula',
                'description' => 'Known for its diverse culture and historical sites.',
                'image_url' => ''
            ],
            [
                'name' => 'Cabo Delgado',
                'description' => 'Rich in natural resources, including gas reserves.',
                'image_url' => ''
            ],
            [
                'name' => 'Niassa',
                'description' => 'Located in the northernmost part of the country.',
                'image_url' => ''
            ],
        ];

        foreach ($provinces as $province) {
            DB::table('provincias')->insert([
                'name' => $province['name'],
                'description' => $province['description'],
            ]);
        }
    }
}
