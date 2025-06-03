<?php

namespace App\Enumeration;

enum RoomStatus: string
{
    use EnumerationToArray;

    case Open = 'Свободно';
    case Booked = 'Забронированно';
    case Fix = 'На техническом обслуживании';
}
