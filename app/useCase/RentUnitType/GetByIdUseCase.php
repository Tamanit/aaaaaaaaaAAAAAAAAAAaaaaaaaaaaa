<?php

namespace App\useCase\RentUnitType;

use App\Services\RentUnitTypeService;

class GetByIdUseCase
{
    public function __construct(protected RentUnitTypeService $service)
    {

    }
    public function use($request)
    {
        return $this->service->getById($request->id);
    }
}
