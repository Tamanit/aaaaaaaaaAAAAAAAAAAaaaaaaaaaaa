<?php

namespace App\UseCase\tenantLk;

use App\Service\Tenant\RentService;
use Illuminate\Http\Request;

class rentRentUnitUseCase
{
    public function __construct(
        protected RentService $rentService,
    ) {
    }

    public function use(Request $request): bool
    {
        $data = $request->all();
        try {
            $this->rentService->rent($data);
        } catch (\Exception $exception) {
            abort(400, $exception->getMessage());
        }
    }
}
