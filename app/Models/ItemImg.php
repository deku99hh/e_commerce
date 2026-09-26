<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemImg extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function itemVariant() : BelongsTo
    {
        return $this->BelongsTo(ItemVariant::class);
    }

}
