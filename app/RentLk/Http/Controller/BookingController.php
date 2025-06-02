<?php

namespace App\RentLk\Http\Controller;

use App\Models\Booking;
use App\RentLk\Http\Request\BookingRequest;
use App\RentLk\ViewConfigFactory\BookingViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

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
