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
                'image_url' => 'https://i.pinimg.com/564x/6a/b1/78/6ab178c034bd77a426eacf47962a1890.jpg'
            ],
            [
                'name' => 'Manica',
                'description' => 'Known for its agricultural and mining activities.',
                'image_url' => 'https://i.pinimg.com/564x/9a/d0/22/9ad022c8a0c687c7d497e1d38c039815.jpg'
            ],
            [
                'name' => 'Tete',
                'description' => 'Rich in mineral resources and scenic landscapes.',
                'image_url' => 'https://i.pinimg.com/564x/d8/01/f5/d801f5a6a92d1496d9a477b203c2570a.jpg'
            ],
            [
                'name' => 'Zambezia',
                'description' => 'One of the most populous provinces in Mozambique.',
                'image_url' => 'https://images.unsplash.com/photo-1625819397064-9c694a43dbba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
            ],
            [
                'name' => 'Nampula',
                'description' => 'Known for its diverse culture and historical sites.',
                'image_url' => 'https://i.pinimg.com/750x/c2/bf/bc/c2bfbc95b220a02d3513a654013da8e9.jpg'
            ],
            [
                'name' => 'Cabo Delgado',
                'description' => 'Rich in natural resources, including gas reserves.',
                'image_url' => 'https://i.pinimg.com/564x/eb/42/b0/eb42b00d0134afd8a6ed607336268888.jpg'
            ],
            [
                'name' => 'Niassa',
                'description' => 'Located in the northernmost part of the country.',
                'image_url' => 'https://i.pinimg.com/564x/33/12/54/331254c2af738eb3d0677158e570c578.jpg'
            ],
        ];

        foreach ($provinces as $province) {
            DB::table('provincias')->insert([
                'name' => $province['name'],
                'description' => $province['description'],
                'image_url' => $province['image_url'],
            ]);
        }
    }
}
