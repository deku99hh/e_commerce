<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemVariant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item() : BelongsTo
    {
        return $this->BelongsTo(Item::class);
    }

    public function carts() : BelongsToMany
    {
        return $this->BelongsToMany(Cart::class, 'cart_items')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function images() : HasMany
    {
        return $this->HasMany(ItemImg::class, 'item_variant_id');
    }

    public function orders() : BelongsToMany
    {
        return $this->BelongsToMany(Order::class, 'order_items')
            ->withPivot('item_id', 'quantity', 'price')
            ->withTimestamps();

    }

    protected static function booted()
    {
        static::saving(function ($variant) {
            if ($variant->is_primary) {
                static::where('id', $variant->id)
                    ->where('id', '!=', $variant->id)
                    ->update(['is_primary' => false]);
            }
        });
    }

}
