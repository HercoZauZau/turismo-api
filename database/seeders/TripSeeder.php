<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Package;
class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Assuming you want to create a few sample trips
      $packages = Package::all();

     foreach ($packages as $package) {
          Trip::create([
              'id_package' => 2,
              'id_guide' => $package->id_guide,
              'id_tourist' => 2, // Replace this with logic to get actual tourist ID
              'date' => now()->addDays(rand(1, 30)), // Random date within the next 30 days
              'number_people' => rand(1, 5), // Random number of people
              'is_accepted' => 'pendente',
            'price' => $package->base_price * 10, 
              
          ]);
      }
  }
}
    


