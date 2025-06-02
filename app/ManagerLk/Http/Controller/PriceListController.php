<?php

namespace App\ManagerLk\Http\Controller;

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\PriceListRequest;
use App\Models\PriceList;
use App\RentLk\ViewConfigFactory\PriceListViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

class PriceListController extends RestController
{
    public static string $route = 'mg/price-lists';
    protected string $model = PriceList::class;

    public function __construct(
        protected PriceListViewConfigFactory $viewConfigFactory
    ) {
        $this->createRequest = PriceListRequest::class;
        $this->updateRequest = PriceListRequest::class;
        $this->viewConfig = $this->viewConfigFactory->fill();
        parent::$route = self::$route;
        parent::__construct();
    }
}
