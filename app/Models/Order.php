<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function address(): BelongsTo
    {
        return $this->BelongsTo(UserAddress::class, 'shipping_address_id');
    }

    public function payment(): HasOne
    {
        return $this->HasOne(Payment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'order_items')
            ->withPivot('variant_id', 'quantity', 'price')
            ->withTimestamps();
    }

}
