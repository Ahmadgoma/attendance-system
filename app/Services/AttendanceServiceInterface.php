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
     * @param int $userId
     * @return bool
     */
    public function attendEmployee(int $userId): bool;
}