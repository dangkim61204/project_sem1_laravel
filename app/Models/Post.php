<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryScopes;
use Illuminate\Validation\Rule;
use DB;

class Post extends Model
{
    use HasFactory, SoftDeletes, QueryScopes;

    protected $table = 'posts';
    protected $fillable = [
        'image',
        'album',
        'publish',
        'order',
        'name',
        'description',
        'content',
        'user_id',
        'icon',
        'post_catalogue_id'	
    ];

    

    public function post_catalogues() {
        return $this->belongsToMany(PostCatalogue::class, 'post_catalogue_post','post_id' ,'post_catalogue_id');
    }

  

 


}
