<?php

namespace App\Services;

use App\Http\Requests\Api\LoginRequest;
use App\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->userRepository->getBy(['user_type_id' => config('user_types.employee')]);
    }

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object
    {
        return $this->userRepository->create($data);
    }

    /**
     * @param int $id
     * @return object
     */
    public function getEmployee(int $id): object
    {
        return $this->userRepository->find($id);
    }

    /**
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request): object
    {
        $user = $this->userRepository->findBy($request->only(['email', 'pin_code']));
        if ($user) {
            $this->processAuthOperation($user);
            return $this->userRepository->find($user->id);
        }

        return $user;
    }

    /** Generate token by passport
     * save token from passport to user table
     * @param object $user
     * @return bool
     */
    private function processAuthOperation(object $user): bool
    {
        $data['token'] = $this->generateTokenByPassport($user);
        return $this->userRepository->update($user->id, $data);
    }

    /**
     * @param object $user
     * @return string
     */
    private function generateTokenByPassport(object $user): string
    {
        return $user->createToken('attendance')->accessToken;
    }

}