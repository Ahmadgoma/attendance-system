<?php

namespace App\Services;

use App\Http\Requests\Api\LoginRequest;

interface UserServiceInterface
{
    /**
     * @return array
     */
    public function getEmployees(): array;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param int $id
     * @return object
     */
    public function getEmployee(int $id): object;

    /**
     * @param LoginRequest $request
     * @return object
     */
    public function login(LoginRequest $request): object;
}