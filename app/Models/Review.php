<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'rating',
        'status'
    ];

    /**
     * Get product that owns this review.
     *
     * @return BelongsTo<Product, Review>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get user that own this review.
     *
     * @return BelongsTo<User, Review>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
