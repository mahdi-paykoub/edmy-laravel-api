<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(10)->create();
        \App\Models\Course::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // \App\Models\Article::factory(10)->create();

        // \App\Models\Article::factory()->create([
        //     'title' => 'Test User',
        //     'description' => 'test@example.com',
        //     'short_name' => 'test@example.com',
        //     'image' => 'test@example.com',
        //     'body' => 'test@example.com',
        // ]);
    }
}
