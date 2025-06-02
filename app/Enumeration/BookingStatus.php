<?php

namespace App\Enumeration;

enum BookingStatus
{
    use EnumerationToArray;

    case Canceled;
    case Active;
    case Closed;
}
