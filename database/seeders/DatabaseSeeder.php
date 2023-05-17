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

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create([
            'title' => 'A personal post',
            'slug' => 'a-personal-post',
            'excerpt' => 'A personal post excerpt',
            'body' => '<p>A personal post content</p>',
            'user_id' => $user->id,
            'category_id' => $personal->id,
        ]);

        Post::create([
            'title' => 'A work post',
            'slug' => 'a-work-post',
            'excerpt' => 'A work post excerpt',
            'body' => '<p>A work post content</p>',
            'user_id' => $user->id,
            'category_id' => $work->id,
        ]);

        Post::create([
            'title' => 'A hobby post',
            'slug' => 'a-hobby-post',
            'excerpt' => 'A hobby post excerpt',
            'body' => '<p>A hobby post content. </p>',
            'user_id' => $user->id,
            'category_id' => $hobbies->id,
        ]);
    }
}
