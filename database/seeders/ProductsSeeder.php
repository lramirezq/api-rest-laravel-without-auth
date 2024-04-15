<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();  
        for ($i = 0; $i < 50; $i++) {
            Products::create([
                'nombre' => $faker->name,
                'precio' => $faker->numberBetween(1,100),
                
            ]);
        }
    }
}
