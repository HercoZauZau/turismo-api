<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
     
            DB::table('users')->insert([
                [
                    'name' => 'Admin',
                    'birth_day' => '1990-01-01',
                    'user_type' => 'admin',
                    'gender' => 'masculino',
                    'phone' => '123456789',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('password'),
          
                    'provincia_id' => 1,
                ],
                [
                    'name' => 'Turista',
                    'birth_day' => '1995-05-05',
                    'user_type' => 'turista',
                    'gender' => 'feminino',
                    'phone' => '987654321',
                    'email' => 'joaquim@gmail.com',
                    'password' => bcrypt('password'),
               
                    'provincia_id' => 2,
                ],
                [
                    'name' => 'Guia',
                    'birth_day' => '1985-08-15',
                    'user_type' => 'guia',
                    'gender' => 'masculino',
                    'phone' => '555555555',
                    'email' => 'guia@gmail.com',
                    'password' => bcrypt('password'),
                  
                    'provincia_id' => 3,
                ],
            ]);
        
        
        
        
    }
}
