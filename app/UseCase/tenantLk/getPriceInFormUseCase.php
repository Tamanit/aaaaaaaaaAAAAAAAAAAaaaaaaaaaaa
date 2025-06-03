<?php

namespace App\UseCase\tenantLk;

use App\Service\Tenant\RentService;

class getPriceInFormUseCase
{
    public function __construct(
        protected RentService $rentService
    ) {
    }

    public function use()
    {
    }
}
