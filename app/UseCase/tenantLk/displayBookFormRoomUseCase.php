<?php

namespace App\UseCase\tenantLk;

use App\Dto\tenantLk\ajaxDto\Factory\BookFormRequestDtoFactory;
use App\Service\Tenant\BookingService;
use Illuminate\Http\Request;

class displayBookFormRoomUseCase
{
    public function __construct(
        protected BookingService $bookingService,
        protected BookFormRequestDtoFactory $bookFormRequestDtoFactory
    ) {
    }

    public function use(Request $request)
    {
        $dto = $this->bookFormRequestDtoFactory->createFromRequest($request);
        return $this->bookingService->getBookingTimes($dto);
    }
}
