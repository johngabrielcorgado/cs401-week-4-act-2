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

        if ($users->count() == 0) {
            echo 'No users found, please run UserSeeder.';
            return;
        }

        Post::factory(20)->create()->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
