<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\FaqTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\NewsTableSeeder;
use Database\Seeders\ContactSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(ContactSeeder::class);

    }
}
