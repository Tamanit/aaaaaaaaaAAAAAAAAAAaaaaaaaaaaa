<?php

namespace App\Enumeration;

enum ActType
{
    use EnumerationToArray;

    case onRent;
    case OnRefund;
}
