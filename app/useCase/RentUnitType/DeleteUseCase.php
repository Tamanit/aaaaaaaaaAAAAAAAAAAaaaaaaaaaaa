<?php

namespace App\useCase\RentUnitType;

use App\Services\RentUnitTypeService;

class DeleteUseCase
{
    public function __construct(protected RentUnitTypeService $service)
    {

    }
    public function use($request)
    {
        return $this->service->delete($request->id);
    }
}
