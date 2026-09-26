<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
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
            'comment' => $this->faker->sentences(3),
            'rating' => $this->faker->numberBetween(1 ,10),

            'user_id' => User::factory(),
            'item_id' => Item::factory(),
        ];
    }
}
