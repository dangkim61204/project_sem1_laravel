<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Catalogue extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'catalogues';
    protected $fillable = [
        'image',
        'content',
        'album',
        'description',
        'publish',
        'name',
        'user_id',
        'slug',
        'visible'

    ];

   

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }



}
