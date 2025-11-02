<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_active',
    ];

    /**
     * Get orders that use this payment method.
     *
     * @return HasMany<Order, PaymentMethod>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
