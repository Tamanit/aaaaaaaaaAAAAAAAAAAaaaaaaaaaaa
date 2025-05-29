<?php

namespace App\useCase\RentUnit;

use App\Services\RentUnitService;


class DeleteUseCase
{
    public function __construct(protected RentUnitService $service)
    {

    }
    public function use($request)
    {
        return $this->service->delete($request->id);
    }
}
