<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $table = 'tags';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'discount_id',
        'is_active',
    ];

    /**
     * @return BelongsTo<Discount, Tag>
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Get products that owns this tag.
     *
     * @return HasMany<ProductTag, Tag>
     */
    public function productTag(): HasMany
    {
        return $this->hasMany(ProductTag::class);
    }
}
