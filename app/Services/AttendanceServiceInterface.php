<?php

namespace App\Services;

interface AttendanceServiceInterface
{
    /**
     * @param int $userId
     * @return array
     */
    public function getEmployees(int $userId): array;

    /**
     * @return bool
     */
    public function attendEmployee(): bool;
}