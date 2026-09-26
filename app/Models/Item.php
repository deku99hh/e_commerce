<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tags() : BelongsToMany
    {
        return $this->BelongsToMany(Tag::class, 'tag_pivot');
    }

    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('variant_id', 'quantity', 'price')
            ->withTimestamps();
    }

    public function variants() : HasMany
    {
        return $this->HasMany(ItemVariant::class);
    }

    public function reviews() : HasMany
    {
        return $this->HasMany(Review::class);
    }

    public function carts() : BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
            ->withPivot('variant_id', 'quantity')
            ->withTimestamps();
    }

    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

}
