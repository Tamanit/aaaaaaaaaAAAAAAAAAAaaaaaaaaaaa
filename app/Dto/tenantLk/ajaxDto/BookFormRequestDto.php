<?php

namespace App\Dto\tenantLk\ajaxDto;

class BookFormRequestDto
{
    public function __construct(
        public string $room_id,
        public string $date
    ) {
    }
}
