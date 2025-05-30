<?php

namespace App\Shared\Enumeration;

enum ActType
{
    use EnumerationToArray;

    case onRent;
    case OnRefund;
}
