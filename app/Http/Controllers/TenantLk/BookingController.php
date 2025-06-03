<?php

namespace App\Http\Controllers\TenantLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\TenantLk\BookingRequest;
use App\Http\ViewConfigFactories\TenantLk\BookingViewConfigFactory;
use App\Models\Booking;
use App\UseCase\tenantLk\displayBookFormRoomUseCase;
use App\UseCase\tenantLk\searchBookingUseCase;
use App\UseCase\tenantLk\storeBookUseCase;
use Illuminate\Http\Request;

class BookingController extends RestController
{
    public static string $route = 'bookings';
    protected string $model = Booking::class;

    public function __construct(
        protected BookingViewConfigFactory $bookingViewConfigFactory,
        protected searchBookingUseCase $searchBookingUseCase,
        protected displayBookFormRoomUseCase $displayBookFormRoomUseCase,
        protected storeBookUseCase $storeBookUseCase,
    ) {
        $this->createRequest = BookingRequest::class;
        $this->updateRequest = BookingRequest::class;
        parent::$route = 'bookings';
        $this->viewConfig = $this->bookingViewConfigFactory->fill();
        parent::__construct();
    }

    public function search(Request $request)
    {
        return $this->searchBookingUseCase->use($request);
    }

    public function create(): \Inertia\Response
    {
        abort(404);
    }

    public function createBooking(Request $request)
    {
        return $this->displayBookFormRoomUseCase->use($request);
    }

    public function storeBooking(Request $request)
    {
        return $this->storeBookUseCase->use($request);
    }
}
