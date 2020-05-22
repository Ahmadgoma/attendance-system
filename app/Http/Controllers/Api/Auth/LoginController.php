<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\LoginRequest;
use App\Services\UserServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoginController extends ApiController
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * LoginController constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request)
    {
        $authorizedUser = $this->userService->login($request);

        if ($authorizedUser)
            return $this->apiResponse($authorizedUser , Response::HTTP_OK);

        throw new AuthenticationException(trans('messages.login_fail'));
    }
}