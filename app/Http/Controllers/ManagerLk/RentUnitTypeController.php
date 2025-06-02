<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\RentUnitTypeRequest;
use App\Http\ViewConfigFactories\TenantLk\RentUnitTypeViewConfigFactory;
use App\Models\RentUnitType;

class RentUnitTypeController extends RestController
{
    public static string $route = 'mg/rent-unit-types';
    protected string $model = RentUnitType::class;

    public function __construct(
        protected RentUnitTypeViewConfigFactory $rentUnitTypeViewConfigFactory,
    ) {
        $this->createRequest = RentUnitTypeRequest::class;
        $this->updateRequest = RentUnitTypeRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->rentUnitTypeViewConfigFactory->fill();
        parent::__construct();
    }
}
