<?php

namespace App\Enumeration;

enum ReqType
{
    use EnumerationToArray;

    case Help;
    case Cancel;
}

