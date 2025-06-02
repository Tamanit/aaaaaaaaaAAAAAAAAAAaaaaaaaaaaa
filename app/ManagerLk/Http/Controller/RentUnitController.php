<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\RentUnitRequest;
use App\Models\RentUnit;
use App\RentLk\ViewConfigFactory\RentUnitViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

class RentUnitController extends RestController
{
    public static string $route = 'mg/rent-units';
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
