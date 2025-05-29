<?php

namespace App\Http\Enumeration;

enum BookingStatus
{
    use EnumerationToArray;

    case Canceled;
    case Active;
    case Closed;
}
