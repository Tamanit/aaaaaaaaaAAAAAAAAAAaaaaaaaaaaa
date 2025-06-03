<?php

namespace App\Dto\tenantLk\ajaxDto\Factory;

use App\Dto\tenantLk\ajaxDto\BookStoreDto;
use Auth;
use Illuminate\Http\Request;

class BookStoreDtoFactory
{
    public function make(Request $request): BookStoreDto
    {
        $data = $request->all();
        return new BookStoreDto(
            $data['room_id'],
            $data['date'],
            $data['time_slots'],
            Auth::user()->id,
        );
    }
}
