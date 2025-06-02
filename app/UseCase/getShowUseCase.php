<?php

namespace App\UseCase;



use App\Dto\ShowDto\ShowMeta;
use App\Service\RestService;

class getShowUseCase
{
    public function __construct(
        protected RestService $restService
    ) {
    }

    public function use(ShowMeta $meta, string $model, int $id)
    {
        $this->restService->setModel($model);
        return $this->restService->insertAttributes($meta, $id);
    }
}
