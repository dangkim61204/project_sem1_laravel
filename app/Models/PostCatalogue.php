<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Validation\Rule;
use DB;

class PostCatalogue extends Model
{
    use HasFactory, SoftDeletes;
    use NodeTrait;
    protected $table = 'post_catalogues';
    protected $fillable = [
        'parent_id',
        '_lft',
        '_rgt',
        'level',
        'image',
        'content',
        'album',
        'description',
        'publish',
        'name',
        'user_id',
        'visible'

    ];

   

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_catalogue_post', 'post_catalogue_id', 'post_id');
    }

    public static function isNodeCheck($id) {
        
        $node = PostCatalogue::find($id);
        
        if($node->_rgt - $node->_lft !== 1) {
            return false;
        }
        return true;
      
    }

    public static function isCheckDescendant($id) {

        $postCatalogue = PostCatalogue::find($id);
        if($postCatalogue->id == request()->parent_id) {
            return false;
        }else {
            return true;
        }
       
        
    }


}
