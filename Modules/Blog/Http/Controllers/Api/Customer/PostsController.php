<?php

namespace Modules\Blog\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\Criteria\PostSearchCriteria;
use Modules\Blog\Repositories\PostRepository;
use Modules\Blog\Transformers\PostTransformer;
use Modules\Blog\Http\Requests\Post\AddPostRequest;
use Modules\Blog\Http\Requests\Post\EditPostRequest;

class PostsController extends BaseApiController
{
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * mẫu
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $posts = $this->repository
            ->pushCriteria(new PostSearchCriteria($request))
            ->paginate(intval($request->get('per_page')));

        return $this->responseSuccess($this->transform($posts, PostTransformer::class));
    }

    /**
     * @param AddPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AddPostRequest $request)
    {
        $post = $this->repository->create($request->toArray());
        return $this->responseSuccess($this->transform($post, PostTransformer::class));
    }

    /**
     * @param $identifier
     * @param Request $request
     * @return JsonResponse
     */
    public function show ($identifier, Request $request)
    {
        $post = $this->repository->find($identifier);
        return $this->responseSuccess($this->transform($post, PostTransformer::class));
    }

    /**
     * @param EditPostRequest $request
     * @param $identifier
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EditPostRequest $request, $identifier)
    {
        $post = $this->repository->update($request->toArray(),$identifier);
        return $this->responseSuccess($this->transform($post, PostTransformer::class));
    }

    /**
     * @param $identifier
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($identifier)
    {
        $post = $this->repository->find($identifier);

        $this->repository->delete($identifier);

        return $this->responseDeleteSuccess($this->transform($post, PostTransformer::class));
    }
}
