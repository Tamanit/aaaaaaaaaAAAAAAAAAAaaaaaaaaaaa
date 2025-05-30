<?php

namespace App\Shared\UseCase\RentUnit;


use App\Service\RentUnitService;

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
