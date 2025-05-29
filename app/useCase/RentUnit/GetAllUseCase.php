<?php

namespace App\useCase\RentUnit;

use App\Services\RentUnitService;

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
