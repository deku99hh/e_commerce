<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Item;
use App\Models\ItemImg;
use App\Models\ItemVariant;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Cart::factory(10)->create();
        Discount::factory(10)->create();
        Item::factory(10)->create();
        ItemImg::factory(10)->create();
        ItemVariant::factory(10)->create();
        Order::factory(10)->create();
        Payment::factory(10)->create();
        Tag::factory(10)->create();
        UserAddress::factory(10)->create();

    }
}
