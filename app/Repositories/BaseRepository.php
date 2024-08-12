<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

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

    ) {
        $query = $this->model->select($column);
        $query->where(function($query) use($condition) {

            // where mở rộng mình không truyền cụ thể vào
            if(isset($condition['where']) && count($condition['where'])) {
                foreach($condition['where'] as $key => $val) {
                    $query->where($val[0], $val[1], $val[2]);
                }
            }

            return $query;
        })
        ->keyword($condition['keyword'] ?? null)->publish($condition['publish'] ?? null);

        if(isset($relations) && !empty($relations)) {
            foreach($relations as $relation) {
                $query->withCount($relation);
            }
        }


        if(isset($join) && is_array($join) && count($join)) {
           foreach($join as $key => $val) {
            $query->join($val[0], $val[1], $val[2], $val[3]);

           }
        }


        if(isset($rawQuery['post_catalogue_id'])) {

            foreach($rawQuery['whereRaw'] as $key => $val) {
                $query->whereRaw($val[0], $val[1]);
            }
        }


        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }


    public function update(int $id, array $payload = [])
    {
        
        $model = $this->findIdUpdate($id);


        $fal = $model->update($payload);

        return $model->update($payload);
    }
    public function updateByWhereIn(string $whereInField, array $whereIn = [], array $payload = [])
    {

        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }



    // xóa mềm
    public function delete(int $id = 0)
    {
        return $this->findIdUpdate($id)->delete();
    }

    // xóa cứng
    public function forceDelete(int $id = 0)
    {
        return $this->findIdUpdate($id)->forceDelete();
    }

    public function all(array $relation = [])
    {
        return $this->model->with($relation)->get();
    }

    public function findById(
        int $mode_id,
        array $column = [],
        array $relation = []
    ) {

        return $this->model->select($column)->with($relation)->findOrFail($mode_id);
    }


    public function forceDeleteByCondition(array $condition = []){

        $query = $this->model->newQuery();

        foreach($condition as $key => $val) {
            $query->where($val[0], $val[1], $val[2]);
        }

        return $query->forceDelete();

    }

    public function findIdUpdate(
        int $id,

    ) {
        return $this->model->find($id);
    }


    public function editJoinWithId(
        int $id,
        array  $column = ['*'],
        array  $join = [],
        string $relation = ''
    ){

        $query = $this->model->select($column);

        
        if(isset($join) && is_array($join) && count($join)) {
            foreach($join as $key => $val) {
                $query->join($val[0], $val[1], $val[2], $val[3]);
            }
            
            
        }
        
        if(isset($relation) && !empty($relation)) {
            $query->with($relation);
            
        }
        
        
        $query->where($column[0], '=', $id);


        return $query->find($id);

       
    }


    // code

    public function updateByWhere($condition = [], array $payload = []) {
        $query = $this->model->newQuery();

        foreach($condition as $key => $val) {
            $query->where($val[0], $val[1], $val[2]);
        }

        return $query->update($payload);


    }
    
    public function findByCondition($condition = []) {
        $query = $this->model->newQuery();

        foreach($condition as $key => $val) {
            $query->where($val[0], $val[1], $val[2]);
        }
 
        return $query->first();
    }
    public function createPivot($model, array $payload = [], string $relation = '') 
    {
        
        return $model->{$relation}()->attach($model->id, $payload);

    }


}
