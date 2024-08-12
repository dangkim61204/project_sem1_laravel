<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScopes;


class Product extends Model
{
    use HasFactory, QueryScopes;
    protected $fillable = [
        'id',
        'category_id',
        'image',
        'slug',
        'name',
        'album',
        'publish',
        'price',
        'sale_price',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function catalogues(){
        return $this->belongsTo(Catalogue::class, 'category_id', 'id');
    }



}
