<?php

namespace App\Repositories;

interface UserRepositoryInterface
{

    /**
     * @param array $condition
     * @return array
     */
    public function getBy(array $condition): array;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param int $userId
     * @param array $columns
     * @return null|object
     */
    public function find(int $userId, array $columns = ['*']):?object;

    /**
     * @param array $data
     * @param array $columns
     * @return null|object
     */
    public function findBy(array $data, array $columns = ['*']):?object;

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function update(int $userId, array $data): bool;
}