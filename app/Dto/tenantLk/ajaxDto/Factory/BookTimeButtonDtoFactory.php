<?php

namespace App\Dto\tenantLk\ajaxDto\Factory;

use App\Dto\tenantLk\ajaxDto\BookTimeButtonDto;
use App\Models\Booking;

class BookTimeButtonDtoFactory
{
    public function make(Booking $booking): BookTimeButtonDto {
        return new BookTimeButtonDto(

        );
    }
}
