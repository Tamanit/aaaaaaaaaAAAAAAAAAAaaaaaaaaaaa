<?php

namespace App\Shared\Enumeration;

enum ReqType
{
    use EnumerationToArray;

    case Help;
    case Cancel;
}

