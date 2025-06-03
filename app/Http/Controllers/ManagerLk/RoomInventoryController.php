<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\RoomInventoryRequest;
use App\Http\ViewConfigFactories\ManagerLk\RoomInventoryViewConfigFactory;
use App\Models\RoomInventory;

class RoomInventoryController extends RestController
{
    public static string $route = 'room-inventories';
    protected string $model = RoomInventory::class;

    public function __construct(
        protected RoomInventoryViewConfigFactory $roomInventoryViewConfigFactory,
    ) {
        $this->createRequest = RoomInventoryRequest::class;
        $this->updateRequest = RoomInventoryRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->roomInventoryViewConfigFactory->fill();
        parent::__construct();
    }
}
