<?php

namespace App\Http\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ForbiddenRoleWithoutOrganization implements ValidationRule
{
    protected array $forbiddenRoles;

    public function __construct(array $forbiddenRoles)
    {
        $this->forbiddenRoles = array_column($forbiddenRoles, 'value');
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $organizationId = request()->input('organization_id');


        if (empty($organizationId) && in_array($value, $this->forbiddenRoles, true)) {
            $fail("Роль \"$value\" не может быть выбрана без указания организации.");
        }
    }
}
