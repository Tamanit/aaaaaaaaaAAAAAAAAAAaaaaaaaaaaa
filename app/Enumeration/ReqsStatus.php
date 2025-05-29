<?php

namespace App\Enumeration;

enum ReqsStatus
{
    use EnumerationToArray;

    case Sent;
    case Canceled;
    case WorkOn;
    case Closed;
}
