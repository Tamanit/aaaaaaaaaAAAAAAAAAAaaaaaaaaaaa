<?php

namespace App\useCase\RentUnit;

use App\Services\RentUnitService;


class GetByIdUseCase
{
    public function __construct(protected RentUnitService $service)
    {

    }
    public function use($request)
    {
        return $this->service->getById($request->id);
    }
}
