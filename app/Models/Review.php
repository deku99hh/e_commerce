<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item() : BelongsTo
    {
        return $this->BelongsTo(Item::class);
    }

    public function user() : BelongsTo  
    {
        return $this->BelongsTo(User::class);
    }

}
