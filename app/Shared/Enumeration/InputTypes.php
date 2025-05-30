<?php

namespace App\Shared\Enumeration;

enum InputTypes
{
    case text;
    case password;
    case email;
    case select;
    case checkbox;
    case button;
    case table;
    case hidden;
}
