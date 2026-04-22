<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    public function run(): void
    {
        Movie::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Movie::create([
                'title'    => $faker->sentence,
                'synopsis' => $faker->paragraph,
                'year'     => $faker->numberBetween(1990, 2024),
                'cover'    => $faker->imageUrl(),
            ]);
        }
    }
}