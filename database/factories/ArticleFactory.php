<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>  fake()->name(),
            'description' => fake()->text(),
            'short_name' => fake()->slug(),
            'image' => substr(fake()->image('public/assets/images/article', 400, 300, 'article'), 7),
            //substr(fake()->image('public/assets/images/article', 400, 300,'article'), 7)
            'body' => fake()->randomHtml(),
        ];
    }
}
