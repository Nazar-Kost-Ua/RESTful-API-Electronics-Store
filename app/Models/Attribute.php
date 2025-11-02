<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    protected $table = 'attributes';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'unit'
    ];

    /**
     * Get products that owns this attribute.
     *
     * @return BelongsToMany<Product, Attribute>
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot(['value']);
    }
}
