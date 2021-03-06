<?php

namespace App\Services;

use App\Repositories\AttendanceRepositoryInterface;

class AttendanceService implements AttendanceServiceInterface
{
    /**
     * @var AttendanceRepositoryInterface
     */
    private $attendanceRepository;

    /**
     * AttendanceService constructor.
     * @param AttendanceRepositoryInterface $attendanceRepository
     */
    public function __construct(AttendanceRepositoryInterface $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }

    /**
     * @return array
     */
    public function getEmployees(int $userId): array
    {
        return $this->attendanceRepository->getAttendanceWorkByUserId($userId);
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function attendEmployee(int $userId): bool
    {
        $checkInData = [
            'check_in' => now(),
            'user_id' => $userId
        ];

        $checkOutData = [
            'check_out' => now(),
            'user_id' => $userId
        ];

        $attendanceDay = $this->attendanceRepository->findByDay();
        if ($attendanceDay)
            return $this->attendanceRepository->update($attendanceDay, $checkOutData);
        return (bool) $this->attendanceRepository->create($checkInData);
    }
}