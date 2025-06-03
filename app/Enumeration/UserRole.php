<?php

namespace App\Enumeration;

enum UserRole: string
{
    use EnumerationToArray;

    case TenantRentOrganizationWorker = 'Сотрудник арендатора';
    case Administrator = 'Администратор';
    case Worker = 'Сотрудник коворкинг-центра';
    case TenantOrganizationAdministrator = 'Администратор арендатора';
}
