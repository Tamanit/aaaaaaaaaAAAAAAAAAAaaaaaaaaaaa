<?php

namespace App\Dto\tenantLk\ajaxDto\Factory;

use App\Dto\tenantLk\ajaxDto\BookFormRequestDto;
use Illuminate\Http\Request;

class BookFormRequestDtoFactory
{
    public function createFromRequest(Request $request): BookFormRequestDto {
        $data = $request->all();
        return new BookFormRequestDto(
            room_id: $data['room_id'],
            date: $data['date'],
        );
    }
}
