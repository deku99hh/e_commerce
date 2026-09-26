<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ====================================================

    public function addresses() :HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function cart() :HasOne
    {
        return $this->hasOne(Cart::class);
    }
    
    public function reviews() :HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function payments() :HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function items() :HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function orders() :HasMany
    {
        return $this->hasMany(Order::class);
    }

}
