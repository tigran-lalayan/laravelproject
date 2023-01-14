<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('news')->insert([
                'title' => $faker->sentence,
                'cover_image' => $faker->imageUrl(640, 480),
                'content' => $faker->paragraph,
                'publishing_date' => $faker->dateTime,
            ]);
        }
    }
}

