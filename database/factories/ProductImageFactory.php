<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected static int $position = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if(static::$position == 4) {
            static::$position = 0;
        }
        return [
            'product_id' => '',
            'url' => fake()->imageUrl(),
            'position' => self::$position++,
        ];
    }
}
