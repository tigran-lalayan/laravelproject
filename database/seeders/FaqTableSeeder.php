<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = ['category 1', 'category 2', 'category 3'];
        foreach($categories as $category) {
            $newCategory = FaqCategory::create([
                'name' => $category
            ]);
            for ($i = 0; $i < 3; $i++) {
                Faq::create([
                    'question' => $faker->sentence,
                    'answer' => $faker->paragraph,
                    'faq_category_id' => $newCategory->id
                ]);
            }
        }
    }
}
