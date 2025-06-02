<?php

namespace App\Shared\Enumeration;

use JsonSerializable;

enum UserRole: string
{
    use EnumerationToArray;

    case TenantRentOrganizationWorker = 'Сотрудник арендатора';
    case Administrator = 'Администратор';
    case Worker = 'Сотрудник коворкинг-центра';
    case TenantOrganizationAdministrator = 'Администратор арендатора';
}
