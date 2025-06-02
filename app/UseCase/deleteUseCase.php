<?php

namespace App\UseCase;



use App\Service\RestService;

class deleteUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(int $id, string $model): void
    {
        try {
            $this->managerLkRestService->setModel($model);
            $this->managerLkRestService->deleteById($id);
        } catch (\Exception $exception) {
            abort(404, $exception->getMessage());
        }
    }
}
