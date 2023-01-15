<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear the table
        Contact::truncate();

        $faker = Faker::create();

        // create a few contact forms in the database:
        for ($i = 0; $i < 50; $i++) {
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'message' => $faker->paragraph,
            ]);
        }
    }
}
