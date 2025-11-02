<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryType extends Model
{
    protected $table = 'delivery_types';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_active',
    ];

    /**
     * Get orders that use this delivery type.
     *
     * @return HasMany<Order, DeliveryType>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
