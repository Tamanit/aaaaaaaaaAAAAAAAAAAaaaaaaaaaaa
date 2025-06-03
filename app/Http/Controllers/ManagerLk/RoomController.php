<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\RoomRequest;
use App\Http\ViewConfigFactories\ManagerLk\RoomViewConfigFactory;
use App\Models\Room;

class RoomController extends RestController
{
    public static string $route = 'rooms';
    protected string $model = Room::class;

    public function __construct(
        protected RoomViewConfigFactory $roomViewConfigFactory,
    ) {
        $this->createRequest = RoomRequest::class;
        $this->updateRequest = RoomRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->roomViewConfigFactory->fill();
        parent::__construct();
    }
}
