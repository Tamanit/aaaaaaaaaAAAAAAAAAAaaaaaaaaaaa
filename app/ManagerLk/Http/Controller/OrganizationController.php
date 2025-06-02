<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\OrganizationRequest;
use App\Models\Organization;
use App\RentLk\ViewConfigFactory\OrganizationViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

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
