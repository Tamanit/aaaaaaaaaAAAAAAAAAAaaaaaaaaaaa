<?php

namespace App\Shared\Enumeration;

enum ErrorCodes
{
    use EnumerationToArray;

    case NullFromDb;
    case NullModel;
}
