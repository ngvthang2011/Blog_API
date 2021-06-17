<?php
namespace Modules\Blog\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Blog\Entities\Post;

class PostTransformer extends TransformerAbstract
{
    /**
     * @param Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'image' => $post->image,
            'like' => $post->like,
            'user' => $post->user,
            'category' => $post->category,
        ];
    }
}
