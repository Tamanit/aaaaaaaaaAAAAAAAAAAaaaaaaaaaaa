<?php

namespace App\Shared\UseCase\RentUnitType;

use App\Service\RentUnitTypeService;

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
