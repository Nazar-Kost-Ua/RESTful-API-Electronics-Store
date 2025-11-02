<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\DeliveryType;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_ref' => fake()->unique()->uuid(),
            'user_id' => User::inRandomOrder()->value('id'),
            'delivery_type_id' => DeliveryType::inRandomOrder()->value('id'),
            'payment_method_id' => PaymentMethod::inRandomOrder()->value('id'),
            'status' => fake()->randomElement([
                OrderStatus::PENDING->value,
                OrderStatus::PROCESSING->value,
                OrderStatus::COMPLETED->value,
                OrderStatus::FAILED->value,
                OrderStatus::CANCELLED->value,
                OrderStatus::REFUNDED->value,
            ]),
        ];
    }
}
