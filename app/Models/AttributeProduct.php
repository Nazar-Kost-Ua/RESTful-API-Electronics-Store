<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeProduct extends Model
{
    protected $table = 'attribute_product';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'attribute_id',
        'value',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)
            ->withPivot(['value']);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class)
            ->withPivot(['value']);
    }
}
