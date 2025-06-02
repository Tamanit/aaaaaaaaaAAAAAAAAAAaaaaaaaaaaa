<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\RentUnitTypeRequest;
use App\Models\RentUnitType;
use App\RentLk\ViewConfigFactory\RentUnitTypeViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

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
