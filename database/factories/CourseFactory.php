<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  fake()->name(),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'price' => fake()->numberBetween(1000000, 3000000),
            'support' => fake()->randomElement(['تلگرام', 'واتساپ', 'سایت', 'اینستاگرام']),
            'status' => fake()->randomElement(['completed', 'performing', 'presell']),
            'image' => fake()->name(),
            //substr(fake()->image('public/assets/images/article', 400, 300,'article'), 7)
            'is_free' => fake()->randomElement([0, 1]),
        ];
    }
}
