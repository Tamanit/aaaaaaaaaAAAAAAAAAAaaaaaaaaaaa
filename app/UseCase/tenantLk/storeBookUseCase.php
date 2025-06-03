<?php

namespace App\UseCase\tenantLk;


use App\Dto\tenantLk\ajaxDto\BookStoreDto;
use App\Dto\tenantLk\ajaxDto\Factory\BookStoreDtoFactory;
use App\Service\Tenant\BookingService;
use Illuminate\Http\Request;

class storeBookUseCase
{
    public function __construct(
        protected BookingService $bookingService,
        protected BookStoreDtoFactory $bookStoreDtoFactory,
    ) {
    }

    public function use(Request $request): array
    {
        $dto = $this->bookStoreDtoFactory->make($request);
        return $this->bookingService->storeBooking($dto);
    }
}
