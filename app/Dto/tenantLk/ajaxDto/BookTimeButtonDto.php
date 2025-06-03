<?php

namespace App\Dto\tenantLk\ajaxDto;

use App\Enumeration\BookingTimeSlots;

class BookTimeButtonDto
{
    public function __construct(
        public BookingTimeSlots $label,
        public bool $disabled,
        public bool $active = false,
    ) {
    }
}
