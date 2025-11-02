<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'delivery_type_id',
        'payment_method_id',
        'total_price',
    ];

    /**
     * Get user that created this order.
     *
     * @return BelongsTo<User, Order>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get delivery type of this order.
     *
     * @return BelongsTo<DeliveryType, Order>
     */
    public function deliveryType(): BelongsTo
    {
        return $this->belongsTo(DeliveryType::class);
    }

    /**
     * Get payment method of this order.
     *
     * @return BelongsTo<PaymentMethod, Order>
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get products that was added in this order.
     *
     * @return HasMany<OrderItem, Order>
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
