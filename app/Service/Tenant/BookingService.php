<?php

namespace App\Service\Tenant;

use App\Dto\tenantLk\ajaxDto\BookFormRequestDto;
use App\Dto\tenantLk\ajaxDto\BookStoreDto;
use App\Enumeration\BookingStatus;
use App\Enumeration\MessagesToTenant;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BookingService
{
    public function getBookings(?string $searchString): LengthAwarePaginator
    {
        $searchString = $searchString ?? '';
        return Room::where('name', 'ilike', "%{$searchString}%")
            ->orWhere('description', 'ilike', "%{$searchString}%")
            ->orWhere('inventory', 'ilike', "%{$searchString}%")->paginate(20);
    }

    public function getBookingTimes(BookFormRequestDto $dto)
    {
        $timeSlotsJson = Booking::select('time_slots')
            ->where('room_id', 'ilike', "%{$dto->room_id}%")
            ->where('date', $dto->date)
            ->get()
            ->pluck('time_slots');


        return $timeSlotsJson->map(fn($item) => json_decode($item));
    }

    public function storeBooking(BookStoreDto $dto): array
    {
        $alreadyBooked = [];
        foreach ($dto->time_slots as $timeSlot) {
            $timeSlotsFromDb = Booking::select('time_slots')
                ->where('time_slots', 'like', "%{$timeSlot}%")
                ->where('room_id', $dto->room_id)
                ->where('date', $dto->date)->get();

            $timeSlotsFromDb = json_decode($timeSlotsFromDb->pluck('time_slots'));

            $alreadyBooked = array_merge($timeSlotsFromDb, $alreadyBooked);
        }

        if (empty($alreadyBooked)) {
            Booking::create([
                'room_id' => $dto->room_id,
                'date' => $dto->date,
                'time_slots' => json_encode($dto->time_slots, JSON_UNESCAPED_UNICODE),
                'status' => BookingStatus::Active,
                'user_id' => $dto->user_id,
            ]);
            return [MessagesToTenant::SUCCESS_BOOKED];
        } else {
            return [MessagesToTenant::SELECT_ANOTHER_TIME, $alreadyBooked];
        }


    }
}
