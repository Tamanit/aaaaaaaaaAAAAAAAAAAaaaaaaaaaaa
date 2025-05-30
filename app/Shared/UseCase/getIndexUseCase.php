<?php

namespace App\Shared\UseCase;

use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Service\RestService;

class getIndexUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(string $model, IndexMeta $meta) {
        try {
            $this->managerLkRestService->setModel($model);
            return $this->managerLkRestService->getPagination($meta);
        } catch (\Exception $exception) {
//            abort(500, $exception->getMessage());
        }
    }
}
