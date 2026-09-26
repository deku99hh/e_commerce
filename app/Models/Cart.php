<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function variants() : BelongsToMany
    {
        return $this->BelongsToMany(ItemVariant::class, 'cart_items')
            ->withPivot('item_id', 'quantity')
            ->withTimestamps();

    }


}
