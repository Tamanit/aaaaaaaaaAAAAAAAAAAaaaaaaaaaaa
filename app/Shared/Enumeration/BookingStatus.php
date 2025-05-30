<?php

namespace App\Shared\Enumeration;

enum BookingStatus
{
    use EnumerationToArray;

    case Canceled;
    case Active;
    case Closed;
}
