<?php

namespace App\Enumeration;

enum PaymentStatus
{
    use EnumerationToArray;

    case success;
    case refused;
    case in_progress;
    case ext_auth_required;
}
