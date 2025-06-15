<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = \App\Models\Post::all();

        if ($posts->count() === 0) {
            $this->command->warn('No posts found. Seeding 5 posts...');
            \App\Models\Post::factory(5)->create();
            $posts = \App\Models\Post::all();
        }

        \App\Models\Media::factory()->count(10)->make()->each(function ($media) use ($posts) {
            $media->post_id = $posts->random()->id;
            $media->save();
        });
    }
}
