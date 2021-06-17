<?php

namespace Modules\Blog\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package Modules\Blog\Entities
 *
 * @property string $title
 *
 * @property User $user
 */
class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'title', 'content', 'image',
        'user_id', 'like', 'category_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
