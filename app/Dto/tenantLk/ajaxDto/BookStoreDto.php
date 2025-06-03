<?php

namespace App\Dto\tenantLk\ajaxDto;

class BookStoreDto
{
    public function __construct(
        public string $room_id,
        public string $date,
        public array $time_slots,
        public int $user_id
    ) {
    }
}
