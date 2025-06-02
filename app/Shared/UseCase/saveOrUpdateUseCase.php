<?php

namespace App\Shared\UseCase;

use App\ManagerLk\Http\Request\UserRequest;
use App\Shared\Service\RestService;
use Illuminate\Http\Request;

class saveOrUpdateUseCase
{
    public function __construct(
        protected RestService $managerLkRestService
    ) {
    }

    public function use(Request $request, string $model, $id = null, $formRequest = null): void
    {
//        try {
        $data = $this->managerLkRestService->getRequest($request, $formRequest);

        $this->managerLkRestService->setModel($model);
        $this->managerLkRestService->saveOrUpdate($data, $id);
//        } catch (\Exception $exception) {
////            abort(404, $exception->getMessage());
//        }
    }
}
