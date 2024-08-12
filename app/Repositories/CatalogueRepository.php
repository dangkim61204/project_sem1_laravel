<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CatalogueRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Catalogue;
/**
 * Class CatalogueService
 * @package App\Services
 */
class CatalogueRepository extends BaseRepository implements CatalogueRepositoryInterface
{
   
    protected $model;
   public function __construct(Catalogue $model)
   {
        $this->model = $model;
   }

 
    public function edit($id) {
        return Catalogue::find($id);
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
        $query = $this->model->where(function($query) use($condition) {
            if($condition['keyword'] && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%');
            }
            if(isset($condition['publish'])  && $condition['publish'] != 0) {
                $query->where('publish', '=' ,$condition['publish'])
                ;
            }

            if(isset($condition['where']) && count($condition['where'])) {
                foreach($condition['where'] as $key => $val) {
                    $query->where($val[0], $val[1], $val[2]);
                }
            }
            return $query;

        });

        if(isset($join) && is_array($join) && count($join)) {
            foreach($join as $key => $val) {
             $query->join($val[0], $val[1], $val[2], $val[3]);
 
            }
         }
   

        if(isset($orderBy) && is_array($orderBy) && count($orderBy)) {
             $query->orderBy($orderBy[0], $orderBy[1]);
 
         }
 
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }


    


}
