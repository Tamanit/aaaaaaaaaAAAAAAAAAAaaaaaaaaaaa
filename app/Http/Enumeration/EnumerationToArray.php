<?php

namespace App\Http\Enumeration;

trait EnumerationToArray
{
    public static function toArray(): array
    {
        return array_column(self::class, 'name');
    }
}
