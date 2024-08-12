<?php
namespace App\Traits;


trait QueryScopes
{


    public function scopeKeyword($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        }
        return $query;

    }

    public function scopePublish($query, $publish) {
        if(!empty($publish)) {
            $query->where('publish', '=' , $publish);
        }
        return $query;
    }
    public function scopeCategory($query, $category_id) {
        if(!empty($category_id)) {
            $query->where('category_id', '=' , $category_id);
        }
        return $query;
    }
    // public function scopeJoin($query, $join){
    //     if(isset($join) && is_array($join) && count($join)) {
    //         foreach($join as $key => $val) {
    //          $query->join($val[0], $val[1], $val[2], $val[3]);
    //         }
    //      }

    //      return $query;

    // }


    // khong dung
    // public function scopeCustomWhere($query, $where = []) {
    //     if(count($where)) {
    //         foreach($where as $key => $val) {
    //             $query->where($val[0], $val[1], $val[2]);
    //         }
    //     }
    //     return $query;
    // }
    // public function scopeRelation($query, $relations) {
    //     if(!empty($relations) && !empty($relations)) {
    //         foreach($relations as $relation) {
    //             $query->withCount($relation);
    //             $query->with($relation);
    //         }
    //     }
    //     return $query;
    // }
  
}