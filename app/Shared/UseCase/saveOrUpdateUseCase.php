<?php

namespace App\Shared\UseCase;

use App\Shared\Service\RestService;
use Illuminate\Http\Request;

class saveOrUpdateUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(Request $request, $id = null): void
    {
        try {
            $data = $request->all();
            $this->managerLkRestService->saveOrUpdate($data, $id);
        } catch (\Exception $exception) {
            abort(404, $exception->getMessage());
        }
    }
}
