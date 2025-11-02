<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'pending',
            self::PROCESSING => 'processing',
            self::COMPLETED => 'completed',
            self::FAILED => 'failed',
            self::CANCELLED => 'cancelled',
            self::REFUNDED => 'refunded',
        };
    }
}
