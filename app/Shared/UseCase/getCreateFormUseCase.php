<?php

namespace App\Shared\UseCase;

use App\Shared\Dto\FormDto\FormMeta;
use App\Shared\Service\RestService;

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
