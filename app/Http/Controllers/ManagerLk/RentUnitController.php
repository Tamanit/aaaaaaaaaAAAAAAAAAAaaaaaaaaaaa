<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\RentUnitRequest;
use App\Http\ViewConfigFactories\ManagerLk\RentUnitViewConfigFactory;
use App\Models\RentUnit;


class RentUnitController extends RestController
{
    public static string $route = 'rent-units';
    protected string $model = RentUnit::class;

    public function __construct(
        protected RentUnitViewConfigFactory $rentUnitViewConfigFactory,
    ) {
        $this->createRequest = RentUnitRequest::class;
        $this->updateRequest = RentUnitRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->rentUnitViewConfigFactory->fill();
        parent::__construct();
    }
}
