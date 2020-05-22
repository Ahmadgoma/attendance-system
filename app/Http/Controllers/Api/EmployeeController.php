<?php

namespace App\Http\Controllers\Api;

use App\Services\AttendanceServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EmployeeController extends ApiController
{
    /**
     * @var AttendanceServiceInterface
     */
    private $attendanceService;

    /**
     * EmployeeController constructor.
     * @param AttendanceServiceInterface $attendanceService
     */
    public function __construct(AttendanceServiceInterface $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    /**
     * @return JsonResponse
     */
    public function attendEmployee(): JsonResponse
    {
        $this->attendanceService->attendEmployee();

        return $this->apiResponse(trans('messages.check_success'),Response::HTTP_CREATED);
    }
}
