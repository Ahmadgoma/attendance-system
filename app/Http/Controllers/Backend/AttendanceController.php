<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\AttendanceServiceInterface;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    /**
     * @var AttendanceServiceInterface
     */
    private $attendanceService;

    /**
     * AttendanceController constructor.
     * @param AttendanceServiceInterface $attendanceService
     */
    public function __construct(AttendanceServiceInterface $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $result = $this->attendanceService->getEmployees($id);
        return view('backend.employees.view', compact('result'));
    }
}
