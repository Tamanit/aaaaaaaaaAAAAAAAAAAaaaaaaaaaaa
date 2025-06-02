<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\OrganizationRequest;
use App\Http\ViewConfigFactories\ManagerLk\OrganizationViewConfigFactory;
use App\Models\Organization;

class OrganizationController extends RestController
{
    public static string $route = 'mg/organizations';
    protected string $model = Organization::class;

    public function __construct(
        protected OrganizationViewConfigFactory $organizationViewConfigFactory,
    ) {
        $this->createRequest = OrganizationRequest::class;
        $this->updateRequest = OrganizationRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->organizationViewConfigFactory->fill();
        parent::__construct();
    }
}
