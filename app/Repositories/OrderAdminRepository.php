<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderAdminRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Order;
/**
 * Class LanguageService
 * @package App\Services
 */
class OrderAdminRepository extends BaseRepository implements OrderAdminRepositoryInterface
{
   
    protected $model;
   public function __construct(Order $model)
   {
        $this->model = $model;
   }


    public function edit($id) {
        return Order::find($id);
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
