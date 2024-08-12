<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Product;
/**
 * Class ProductService
 * @package App\Services
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
   
    protected $model;
   public function __construct(Product $model)
   {
        $this->model = $model;
   }


    public function edit($id) {
        return Product::find($id);
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
        $query = $this->model->select($column)->where(function($query) use($condition) {
            
            if(isset($condition['where']) && count($condition['where'])) {

                foreach($condition['where'] as $key => $val) {
                    $query->where($val[0], $val[1], $val[2]);
                }
            }
      
            if($condition['category_id']) {
                $query->where('category_id', '=', $condition['category_id']);

                return $query;

            }
            return $query;

            

        }
    )
        ->keyword($condition['keyword'] ?? null)->publish($condition['publish'] ?? null);


        if(isset($relations) && !empty($relations)) {
            foreach($relations as $relation) {
             $query->withCount($relation);
             $query->with($relation);

            }
         }
   

        if(isset($join) && is_array($join) && count($join)) {
            foreach($join as $key => $val) {
             $query->join($val[0], $val[1], $val[2], $val[3]);
            }
         }
   

         if(isset($groupBy) && !empty($groupBy)) {
            foreach($groupBy as $group) {
                $query->groupBy($group);
            }
        }
        
        if(isset($orderBy) && is_array($orderBy) && count($orderBy)) {
             $query->orderBy($orderBy[0], $orderBy[1]);
 
         }
       
 
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }


  
}
