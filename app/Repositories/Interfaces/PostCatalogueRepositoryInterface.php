<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Arr;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface PostCatalogueRepositoryInterface
{

    public function edit($id);
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




}
