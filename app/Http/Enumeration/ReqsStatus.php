<?php

namespace App\Http\Enumeration;

enum ReqsStatus
{
    use EnumerationToArray;

    case Sent;
    case Canceled;
    case WorkOn;
    case Closed;
}
