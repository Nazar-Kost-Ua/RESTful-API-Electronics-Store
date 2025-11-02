<?php

namespace App\Enums;

enum ProductStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case ARCHIVED = 'archived';
    case OUT_OF_STOCK = 'out_of_stock';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'active',
            self::INACTIVE => 'inactive',
            self::ARCHIVED => 'archived',
            self::OUT_OF_STOCK => 'out of stock',
        };
    }
}
