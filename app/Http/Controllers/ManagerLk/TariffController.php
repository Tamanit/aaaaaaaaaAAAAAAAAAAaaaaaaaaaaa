<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\TariffRequest;
use App\Http\ViewConfigFactories\ManagerLk\TariffViewConfigFactory;
use App\Models\Tariff;
;

class TariffController extends RestController
{
    public static string $route = 'mg/tariffs';
    protected string $model = Tariff::class;

    public function __construct(
        protected TariffViewConfigFactory $viewConfigFactory
    ) {
        $this->createRequest = TariffRequest::class;
        $this->updateRequest = TariffRequest::class;
        $this->viewConfig = $this->viewConfigFactory->fill();
        parent::$route = self::$route;
        parent::__construct();
    }
}
