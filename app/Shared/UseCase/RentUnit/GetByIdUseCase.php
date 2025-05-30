<?php

namespace App\Shared\UseCase\RentUnit;

use App\Service\RentUnitService;


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
