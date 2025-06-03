<?php

namespace App\Enumeration;

enum MessagesToTenant: string implements \JsonSerializable
{
    use EnumerationToArray;

    case ALL_BOOKED = 'Все рабочие места заняты';
    case SUCCESSFULLY_BOOKED = 'Рабочее место успешно забронировано';
    case MANAGER_CONTACT = 'С вами свяжется менеджер для уточнения деталей';
    case ALREADY_BOOKED = 'Данное рабочее место уже забронировано';
    case ERROR_OCCURRED = 'Произошла ошибка. Пожалуйста, попробуйте позже';
    case CANCELED = 'Бронирование отменено';
    case PENDING_APPROVAL = 'Ваша заявка ожидает подтверждения';
    case BOOKING_NOT_AVAILABLE = 'Бронирование в данный момент недоступно';
    case SELECT_ANOTHER_TIME = 'Выберите другое время, оно уже забронированно';
    case INSUFFICIENT_ACCESS = 'У вас нет прав для выполнения этого действия';
    case SUCCESS_BOOKED = 'Успешно забронированно';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
