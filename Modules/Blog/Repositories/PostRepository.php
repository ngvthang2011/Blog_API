<?php
namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Post;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;

Class PostRepository extends BaseRepository {
    /**
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {
        return parent::create($attributes);
    }

    /**
     * @param array $attributes
     * @param $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $attributes, $id)
    {
        return parent::update($attributes, $id);
    }

}
