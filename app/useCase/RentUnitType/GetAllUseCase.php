<?php

namespace App\useCase\RentUnitType;

use App\Services\RentUnitTypeService;


class GetAllUseCase
{
    public function __construct(protected RentUnitTypeService $service)
    {
    }
    public function use()
    {
        return $this->service->getAll();
    }
}
