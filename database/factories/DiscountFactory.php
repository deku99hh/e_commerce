<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['percentage', 'fixed']);
        
        $value = $type === 'percentage' 
            ? fake()->numberBetween(5, 50)
            : fake()->numberBetween(10, 100);

        return [
            'code' => $this->faker->unique()->bothify('DISC##??'),
            'type' => $type,
            'value' => $value,
            'min_spend' => $type === 'fixed' ? $value * fake()->numberBetween(2, 5) : fake()->numberBetween(0, 200), 
            'usage_limit_per_user' => fake()->optional(0.8)->numberBetween(1, 3), 
            'expires_at' => fake()->dateTimeBetween('+1 week', '+2 months'),
        ];
    }
}
