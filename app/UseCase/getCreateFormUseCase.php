<?php

namespace App\UseCase;

use App\Dto\FormDto\FormMeta;
use App\Service\RestService;

class getCreateFormUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(FormMeta $meta, string $route): FormMeta
    {
        return $this->managerLkRestService->insertCsrfTokenAndSubmitLink($meta, $route);
    }
}
