<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i < 10 ; $i++) {
            $tags = Tag::factory(10)->create();
            Post::factory(10)->create()->each(function($post) use($tags){
                $post->tags()->attach($tags->random(2));
            });
        }
    }
}
