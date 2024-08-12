<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Permission;
/**
 * Class LanguageService
 * @package App\Services
 */
class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
   
    protected $model;
   public function __construct(Permission $model)
   {
        $this->model = $model;
   }


    public function edit($id) {
        return Permission::find($id);
    }
    public function pagination(
        array  $column = ['*'],
        array  $condition = [],
        array  $join = [],
        int  $perpage = 20,
        array $extend = [],
        array $groupBy = [],
        array $relations = [],
        array $where = [],
        array $rawQuery = []

    )
     {
        $query = $this->model->select($column)->where(function($query) use($condition) {
            if($condition['keyword'] && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                ->orWhere('canonical', 'LIKE', '%'.$condition['keyword'].'%')
               
                ;
            }
            if(isset($condition['publish'])  && $condition['publish'] != 0) {
                $query->where('publish', '=' ,$condition['publish'])
                ;
            }
            return $query;

        });

        if(!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }



}
