<?php

namespace App\Shared\UseCase\RentUnit;

use App\Service\RentUnitService;

class GetAllUseCase
{
    public function __construct(protected RentUnitService $service)
    {
    }
    public function use()
    {
        return $this->service->getAll();
    }
}
