<?php

namespace App\useCase\RentUnitType;

use App\Services\RentUnitTypeService;

class CreateOrUpdateUseCase
{
    public function __construct(protected RentUnitTypeService $service)
    {

    }
    public function use($request)
    {
        $data = $request->validated();

        return $this->service->createOrUpdate($data);
    }
}
