<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ItemVariant>
 */
class ItemVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(5, 50),
            'price' => $this->faker->numberBetween(1, 1000),
            'is_primary' => $this->faker->boolean(10),
            'item_id' => Item::factory(),
        ];
    }
}
