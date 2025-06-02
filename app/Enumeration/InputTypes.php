<?php

namespace App\Enumeration;

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
    case textarea;
    case number;
    case file;
    case datetime;


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
            self::textarea => 'textarea',
            self::number => 'number',
            self::file => 'file',
            self::datetime => 'datetime',
        };
    }
}
