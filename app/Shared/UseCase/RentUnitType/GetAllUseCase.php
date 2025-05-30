<?php

namespace App\Shared\UseCase\RentUnitType;

use App\Service\RentUnitTypeService;


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
