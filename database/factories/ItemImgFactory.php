<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemImg;
use App\Models\ItemVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ItemImg>
 */
class ItemImgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img_path' => 'https://m.media-amazon.com/images/I/71VJZ9ZHjmL._AC_SX679_.jpg',
            'item_variant_id' => ItemVariant::factory(),
        ];
    }
}
