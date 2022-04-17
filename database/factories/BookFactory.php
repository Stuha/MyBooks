<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_name' => $this->faker->name(),
            'title' => $this->faker->word(),
            'category_id' => $this->faker->numberBetween(1, 7),
            'publish_at' => $this->faker->date('Y-m-d'),
            'country' => $this->faker->country(),
            'page_no' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
