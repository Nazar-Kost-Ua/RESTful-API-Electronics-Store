<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'brand_id' => Brand::inRandomOrder()->value('id'),
            'category_id' => Category::whereNotNull('parent_id')->inRandomOrder()->value('id'),
            'color_id' => Color::inRandomOrder()->value('id'),
            'status' => fake()->randomElement(
                [
                    ProductStatus::ACTIVE->value,
                    ProductStatus::INACTIVE->value,
                    ProductStatus::ARCHIVED->value,
                    ProductStatus::OUT_OF_STOCK->value,
                ]
            ),
            'stock' => function ($attributes) {
                if ($attributes['status'] == ProductStatus::OUT_OF_STOCK->value) {
                    return 0;
                } else {
                    return fake()->numberBetween(1,400);
                }
            },
            'price' => function () {
                $min = 4000;
                $max = 50000;
                $step = 10;
                $minStep = (int) ceil($min / $step);
                $maxStep = (int) floor($max / $step);
                return fake()->numberBetween($minStep, $maxStep) * $step;
            },
            'discount_id' => fake()->optional()->randomElement([null, Discount::inRandomOrder()->value('id')]),
            'sku' => strtoupper(fake()->unique()->bothify('??###-??###')),

            'title' => function (array $attributes) {
                $category_name = Category::find($attributes['category_id'])->name;
                $category_name = match ($category_name) {
                    'Smartphones' => 'Smartphone',
                    'Tablets' => 'Tablet',
                    'Laptops' => 'Laptop',
                    'Desktop pc' => 'Desktop PC',
                    default => $category_name,
                };
                $brand_name = Brand::find($attributes['brand_id'])->name;
                $color_name = Color::find($attributes['color_id'])->name;
                $title = fake()->word();
                return "{$category_name} {$brand_name} {$title} {$color_name} ({$attributes['sku']})";
            },

            'slug' => function ($attributes) {
                $slug = str_replace(['(',')', ' '], ['', '', '-'], $attributes['title']);
                return strtolower($slug);
            },
        ];
    }
}
