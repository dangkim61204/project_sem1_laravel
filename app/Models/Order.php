<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['user_id', 'name','status', 'email', 'phone', 'address'];
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
