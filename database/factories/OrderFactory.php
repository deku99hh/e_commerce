<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Order;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
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
            'status' => $this->faker->randomElement(['cancelled', 'pending', 'shipped', 'delivered']),
            'tracking_number' => $this->faker->numberBetween(5, 50000),
            'courier_name' => $this->faker->name(),
            'shipped_at' => $this->faker->dateTime(),
            'delivered_at' => null,
            'total_amount' => $this->faker->numberBetween(5, 50000),

            'user_id' => User::factory(),
            'shipping_address_id' => UserAddress::factory(),
            'discount_id' => Discount::factory(),
        ];
    }
}
