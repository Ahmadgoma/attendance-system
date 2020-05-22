<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $condition
     * @return array
     */
    public function getBy(array $condition): array
    {
        return DB::table('users')
            ->select
            (
                'id',
                'name',
                'email',
                'pin_code',
                'created_at'
            )
            ->where($condition)
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
     * @param int $userId
     * @param array $columns
     * @return null|object
     */
    public function find(int $userId, array $columns = ['*']):?object
    {
        return $this->model->select($columns)->find($userId);
    }

    /**
     * @param array $data
     * @param array $columns
     * @return null|object
     */
    public function findBy(array $data, array $columns = ['*']):?object
    {
        return $this->model->select($columns)->where($data)->first();

    }

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function update(int $userId, array $data): bool
    {
        $user = $this->model->find($userId);

        if (!$user) {
            throw new ModelNotFoundException('There is no user here!');
        }

        $user->fill($data);

        if (!$user->isClean()) {
            $user->save();
            return true;
        }

        return false;
    }
}