<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="post";

    public function comment()
    {
        return $this->hasMany('App\models\Comment', 'post_id', 'id');
    }

}
