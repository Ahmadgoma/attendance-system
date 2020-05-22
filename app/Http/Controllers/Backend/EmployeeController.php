<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EmployeeRequest;
use App\Services\UserServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * EmployeeController constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /** List all employees
     * @return View
     */
    public function index(): View
    {
        $employees = $this->userService->getEmployees();
        return view('backend.employees.index', compact('employees'));
    }

    /** View of creating a new employee
     * @return View
     */
    public function create(): View
    {
        return view('backend.employees.create');
    }

    /**  create a new employee
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $employeeCreated = $this->userService->create($request->validated());

        if ($employeeCreated) {
            return redirect()->route('employees.index')->with('success', 'Employee has been created successfully.');
        }
        return redirect()->route('employees.index')->with('error', 'Error in creating employee.');
    }
}
