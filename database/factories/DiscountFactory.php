<?php

namespace Database\Factories;

use App\Enums\DiscountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    protected static int $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement([
            DiscountType::PERCENT->value,
            DiscountType::FIXED->value,
        ]);
        $value = match ($type) {
                'percent' => fake()->randomElement(range(10, 70, 10)),
                'fixed' => fake()->numberBetween(100,2000),
            };

        $start_date = fake()->randomElement([null, now()]);
        $end_date = $start_date ? fake()->dateTimeBetween('now', '+1 month')
            ->format('Y-m-d') : null;

        return [
            'title' => 'discount' . self::$i++,
            'type' => $type,
            'value' => $value,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'is_active' => fake()->randomElement([true, false]),
        ];
    }
}
