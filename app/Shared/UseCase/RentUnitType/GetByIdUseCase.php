<?php

namespace App\Shared\UseCase\RentUnitType;

use App\Service\RentUnitTypeService;

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
