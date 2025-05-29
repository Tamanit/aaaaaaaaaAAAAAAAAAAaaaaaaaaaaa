<?php

namespace App\Enumeration;

trait EnumerationToArray
{
    public static function toArray(): array
    {
        return array_column(self::class, 'name');
    }
}
