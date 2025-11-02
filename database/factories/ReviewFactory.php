<?php

namespace Database\Factories;

use App\Enums\ReviewStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'product_id' => Product::inRandomOrder()->value('id'),
            'content' => fake()->paragraph(),
            'rating' => fake()->randomDigit(),
            'status' => fake()->randomElement([
                ReviewStatus::IN_MODERATION->value,
                ReviewStatus::PUBLISHED->value,
                ReviewStatus::REJECTED->value,
            ]),
        ];
    }
}
