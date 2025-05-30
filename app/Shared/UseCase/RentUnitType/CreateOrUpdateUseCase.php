<?php

namespace App\Shared\UseCase\RentUnitType;

use App\Service\RentUnitTypeService;

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
