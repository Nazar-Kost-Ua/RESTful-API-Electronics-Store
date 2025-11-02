<?php

namespace App\Enums;

enum ReviewStatus: string
{
    case IN_MODERATION = 'in_moderation';
    case PUBLISHED = 'published';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::IN_MODERATION => 'in moderation',
            self::PUBLISHED => 'published',
            self::REJECTED => 'rejected',
        };
    }

}
