<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $personal = Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(10)->create([
            'category_id' => $personal->id,
        ]);

        $work = Category::factory()->create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::factory(10)->create([
            'category_id' => $work->id,
        ]);

        $hobbies = Category::factory()->create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::factory(10)->create([
            'category_id' => $hobbies->id,
        ]);


    }
}
