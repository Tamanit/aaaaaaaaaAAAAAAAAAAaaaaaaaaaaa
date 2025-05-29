<?php

namespace App\useCase\RentUnit;


use App\Models\RentUnit;
use App\Services\RentUnitService;

class CreateOrUpdateUseCase
{
    public function __construct(protected RentUnitService $service)
    {

    }
    public function use($request)
    {
        $data = $request->validated();
        return $this->service->createOrUpdate($data);
    }
}
