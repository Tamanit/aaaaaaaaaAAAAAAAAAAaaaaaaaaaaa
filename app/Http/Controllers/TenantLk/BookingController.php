<?php

namespace App\Http\Controllers\TenantLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\TenantLk\BookingRequest;
use App\Http\ViewConfigFactories\TenantLk\BookingViewConfigFactory;
use App\Models\Booking;

class BookingController extends RestController
{
    public static string $route = 'lk/bookings';
    protected string $model = Booking::class;

    public function __construct(
        protected BookingViewConfigFactory $bookingViewConfigFactory,
    ) {
        $this->createRequest = BookingRequest::class;
        $this->updateRequest = BookingRequest::class;
        parent::$route = 'bookings';
        $this->viewConfig = $this->bookingViewConfigFactory->fill();
        parent::__construct();
    }

    public function create()
    {

    }
}
