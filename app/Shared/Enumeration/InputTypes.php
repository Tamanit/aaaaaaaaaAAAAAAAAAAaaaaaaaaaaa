<?php

namespace App\Shared\Enumeration;

use JsonSerializable;

enum InputTypes implements JsonSerializable
{
    case text;
    case password;
    case email;
    case select;
    case checkbox;
    case button;
    case table;
    case hidden;


    public function jsonSerialize(): string
    {
        return match ($this) {
            self::text => 'text',
            self::password => 'password',
            self::email => 'email',
            self::select => 'select',
            self::checkbox => 'checkbox',
            self::button => 'button',
            self::table => 'table',
            self::hidden => 'hidden',
        };
    }
}
