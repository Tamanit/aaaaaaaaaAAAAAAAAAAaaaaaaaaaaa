<?php

namespace App\Shared\Enumeration;

enum UserRole: string
{
    use EnumerationToArray;

    case Administrator = 'Администратор';
    case Worker = 'Сотрудник коворкинг-центра';
    case TenantOrganizationAdministrator = 'Администратор арендатора';
    case TenantRentOrganizationWorker = 'Сотрудник арендатора';
}
