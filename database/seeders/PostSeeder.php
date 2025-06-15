<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $users = User::all();

    if ($users->count() === 0) {
        $this->command->warn('No users found. Seeding 5 users...');
        \App\Models\User::factory(5)->create();
        $users = User::all();
    }

    Post::factory(20)->make()->each(function ($post) use ($users) {
        $post->user_id = $users->random()->id;
        $post->save();
    });
    }
}
