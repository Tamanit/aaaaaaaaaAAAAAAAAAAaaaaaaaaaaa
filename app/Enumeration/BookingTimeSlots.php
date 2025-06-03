<?php

namespace App\Enumeration;

use JsonSerializable;

enum BookingTimeSlots: string implements JsonSerializable
{
    use EnumerationToArray;

    case time__08_00 = '8:00 - 8:30';
    case time__08_30 = '8:30 - 9:00';
    case time__09_00 = '9:00 - 9:30';
    case time__09_30 = '9:30 - 10:00';
    case time__10_00 = '10:00 - 10:30';
    case time__10_30 = '10:30 - 11:00';
    case time__11_00 = '11:00 - 11:30';
    case time__11_30 = '11:30 - 12:00';
    case time__12_00 = '12:00 - 12:30';
    case time__12_30 = '12:30 - 13:00';
    case time__13_00 = '13:00 - 13:30';
    case time__13_30 = '13:30 - 14:00';
    case time__14_00 = '14:00 - 14:30';
    case time__14_30 = '14:30 - 15:00';
    case time__15_00 = '15:00 - 15:30';
    case time__15_30 = '15:30 - 16:00';
    case time__16_00 = '16:00 - 16:30';
    case time__16_30 = '16:30 - 17:00';
    case time__17_00 = '17:00 - 17:30';
    case time__17_30 = '17:30 - 18:00';
    case time__18_00 = '18:00 - 18:30';
    case time__18_30 = '18:30 - 19:00';
    case time__19_00 = '19:00 - 19:30';
    case time__19_30 = '19:30 - 20:00';
    case time__20_00 = '20:00 - 20:30';
    case time__20_30 = '20:30 - 21:00';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
