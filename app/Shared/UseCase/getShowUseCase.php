<?php

namespace App\Shared\UseCase;

use App\Shared\Dto\ShowDto\ShowMeta;
use App\Shared\Service\RestService;

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
