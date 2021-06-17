<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    public $timestamps = false;

    public function post()
    {
        return $this->hasMany('App\models\Post', 'category_id', 'id');
    }
    
}
