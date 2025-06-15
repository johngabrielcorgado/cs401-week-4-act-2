<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_name' => fake()->word() . '.jpg',
            'file_type' => 'image/jpeg',
            'file_size' => fake()->numberBetween(100, 5000),
            'url' => fake()->imageUrl(640, 480),
            'upload_date' => now(),
            'description' => fake()->sentence(),
        ];
    }
}
