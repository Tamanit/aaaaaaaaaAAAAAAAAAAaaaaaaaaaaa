<?php

namespace App\UseCase\tenantLk;

use App\Service\Tenant\BookingService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class searchBookingUseCase
{
    public function __construct(
        protected BookingService $bookingService
    )
    {

    }

    public function use(Request $request): LengthAwarePaginator
    {
        $data = $request->all();
        $search = $data['search'];
        return $this->bookingService->getBookings($search);
    }
}
