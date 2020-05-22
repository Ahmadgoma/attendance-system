<?php

namespace App\Repositories;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    /**
     * @var Attendance
     */
    private $model;

    /**
     * AttendanceRepository constructor.
     * @param Attendance $model
     */
    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $userId
     * @return array
     */
    public function getAttendanceWorkByUserId(int $userId): array
    {
        $result['sumMonthlyWork'] = $this->getMonthlyWork($userId);

        $result['dailyWork'] = $this->getDailyWork($userId);

        return $result;
    }

    /**
     * @param int $userId
     * @return array
     */
    private function getMonthlyWork(int $userId): array
    {
        return DB::table('attendances')
            ->select
            (
                DB::Raw('Month(check_in) as month'),
                DB::Raw('SUM(TIMESTAMPDIFF(MINUTE,check_in,check_out) / 60)  as sumHours')
            )
            ->where('user_id', $userId)
            ->where('deleted_at', null)
            ->groupBy('month')
            ->get()
            ->toArray();
    }

    /**
     * @param int $userId
     * @return array
     */
    private function getDailyWork(int $userId): array
    {
        return DB::table('attendances')
            ->select
            (
                DB::Raw('TIME(check_in) as check_in_time'),
                DB::Raw('TIME(check_out) as check_out_time'),
                DB::Raw('DATE(check_in) as date'),
                DB::Raw('Month(check_in) as month')
            )
            ->where('user_id', $userId)
            ->where('deleted_at', null)
            ->orderBy('check_in')
            ->get()
            ->toArray();
    }

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    /**
     * @param array $condition
     * @return null|object
     */
    public function findByDay():?object
    {
        return $this->model->whereDay('check_in', date('d'))->first();
    }

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function update(object $attendance, array $data): bool
    {
        $attendance->fill($data);

        if (!$attendance->isClean()) {
            $attendance->save();
            return true;
        }

        return false;
    }
}
