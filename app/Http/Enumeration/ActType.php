<?php

namespace App\Http\Enumeration;

enum ActType
{
    use EnumerationToArray;

    case onRent;
    case OnRefund;
}
