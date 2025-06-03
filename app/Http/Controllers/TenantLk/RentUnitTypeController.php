<?php

namespace App\Http\Controllers\TenantLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\RentUnitTypeRequest;
use App\Http\ViewConfigFactories\TenantLk\RentUnitTypeViewConfigFactory;
use App\Models\RentUnitType;
use Illuminate\Http\Request;

class RentUnitTypeController extends RestController
{
    public static string $route = 'rents';
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

    public function rent(Request $request)
    {
    }

    public function getPrice()
    {
    }
}
