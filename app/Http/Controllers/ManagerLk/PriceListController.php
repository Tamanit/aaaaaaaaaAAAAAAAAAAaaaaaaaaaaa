<?php

namespace App\ManagerLk\Http\Controller;

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\PriceListRequest;
use App\Http\ViewConfigFactories\ManagerLk\PriceListViewConfigFactory;
use App\Models\PriceList;


class PriceListController extends RestController
{
    public static string $route = 'price-lists';
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
