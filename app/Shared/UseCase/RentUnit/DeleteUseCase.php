<?php

namespace App\Shared\UseCase\RentUnit;

use App\Service\RentUnitService;


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
