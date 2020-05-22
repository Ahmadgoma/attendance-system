<?php

namespace App\Repositories;

interface AttendanceRepositoryInterface
{
    /**
     * @param int $userId
     * @return array
     */
    public function getBy(int $userId): array;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @return null|object
     */
    public function findByDay():?object;

    /**
     * @param object $attendance
     * @param array $data
     * @return bool
     */
    public function update(object $attendance, array $data): bool;

}