<?php

namespace App\Http\Enumeration;

enum RentStatus
{
    use EnumerationToArray;

    case Req;
    case MakingContract;
    case Canceled;
    case Preparation;
    case ReadyToRent;
    case ActiveRent;
    case Stopped;
    case Closed;
}
