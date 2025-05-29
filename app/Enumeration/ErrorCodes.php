<?php

namespace App\Enumeration;

enum ErrorCodes
{
    use EnumerationToArray;

    case NullFromDb;
    case NullModel;
}
