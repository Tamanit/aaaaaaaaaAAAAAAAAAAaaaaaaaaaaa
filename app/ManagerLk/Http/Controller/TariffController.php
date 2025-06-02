<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\TariffRequest;
use App\Models\Tariff;
use App\RentLk\ViewConfigFactory\TariffViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

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
