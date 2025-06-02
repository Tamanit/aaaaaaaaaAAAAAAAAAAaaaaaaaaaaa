<?php

namespace App\UseCase;



use App\Dto\FormDto\FormMeta;
use App\Service\RestService;

class getUpdateFormUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(FormMeta $meta, string $model, string $route, int $id): FormMeta
    {
        $this->managerLkRestService->setModel($model);
        $meta = $this->managerLkRestService->insertValuesInInput($meta, $id);
        return $this->managerLkRestService->insertCsrfTokenAndSubmitLink($meta, $route);
    }
}
