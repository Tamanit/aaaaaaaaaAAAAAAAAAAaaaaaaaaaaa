<?php

namespace App\Http\Enumeration;

enum ErrorCodes
{
    use EnumerationToArray;

    case NullFromDb;
    case NullModel;
}
