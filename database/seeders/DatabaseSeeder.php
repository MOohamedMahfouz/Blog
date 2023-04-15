<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Mohamed Mahfouz'
        ]);
        // \App\Models\Post::factory(20)->create();

        $tags = Tag::factory(10)->create();
        Post::factory(10)->create()->each(function($post) use($tags){
            $post->tags()->attach($tags->random(2));
        });
    }
}
