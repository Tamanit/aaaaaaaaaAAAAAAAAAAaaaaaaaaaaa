<?php

namespace App\Shared\Enumeration;

enum ReqsStatus
{
    use EnumerationToArray;

    case Sent;
    case Canceled;
    case WorkOn;
    case Closed;
}
