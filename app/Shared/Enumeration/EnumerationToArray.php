<?php

namespace App\Shared\Enumeration;

use BackedEnum;

trait EnumerationToArray
{
    public static function toArray(): array
    {
        if (self::cases()[0] instanceof BackedEnum) {
            return array_map(function (BackedEnum $value) {
                return [
                    'id' => null,
                    'value' => $value->value,
                ];
            }, self::cases());
        } else {
            return array_column(self::cases(), 'name');
        }
    }
}
