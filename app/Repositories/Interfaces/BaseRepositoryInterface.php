<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{

    public function createPivot($model, array $data = [], string $relation = '');

    public function all(array $relation = []);
    public function create(array $payload = []);
    public function findById(int $id, array $value, array $kk);
    public function update(int $id, array $payload = []);
    public function findIdUpdate(int $id);
    public function delete(int $id = 0);
    public function forceDeleteByCondition(array $condition = []);



    public function pagination(
        array  $column = ['*'],
        array  $condition = [],
        array  $join = [],
        int  $perpage = 1,
        array $extend = [],
        array $groupBy = [],
        array $relations = [],
        array $where = [],
        array $rawQuery = []


    );
    public function updateByWhere($condition = [], array $payload = []);
    public function forceDelete(int $id = 0);

    public function updateByWhereIn(string $whereInField, array $whereInArray = [],array $payload = []);
    public function editJoinWithId(
        int $id,
        array  $column = ['*'],
        array  $join = [],
        string $relation = ''
    );
    public function findByCondition($condition = []);
}
