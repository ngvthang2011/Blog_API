<?php

namespace Modules\Blog\Http\Controllers\Api\Customer;

use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;
use Modules\Blog\Repositories\UserRepository;
use Modules\Blog\Transformers\UserTransformer;
use Modules\Blog\Http\Requests\User\AddUserRequest;
use Modules\Blog\Http\Requests\User\EditUserRequest;
use Illuminate\Support\Facades\Hash;
class UsersController extends BaseApiController
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $users =  $this->repository
                ->paginate(intval($request->get('per_page')));
        return $this->responseSuccess($this->transform($users, UserTransformer::class));
    }

    /**
     * @param AddUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AddUserRequest $request)
    {
        $request->password = bcrypt($request->password);
        $user = $this->repository->create($request->toArray());

        return $this->responseSuccess($this->transform($user, UserTransformer::class));
    }

    /**
     * @param $identifier
     * @return JsonResponse
     */

    public function show($identifier)
    {
        $user = $this->repository->find($identifier);

        return $this->responseSuccess($this->transform($user, UserTransformer::class));
    }

    /**
     * @param EditUserRequest $request
     * @param $identifier
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EditUserRequest $request, $identifier)
    {
//        if(isset($request->password)){
//            $request->fill([
//                'password' => Hash::make($request->password)
//            ])->save();
//        }
//        dd($request->all());
        $user = $this->repository->update($request->toArray(), $identifier);

        return $this->responseSuccess($this->transform($user, UserTransformer::class));
    }

    /**
     * @param $identifier
     * @return JsonResponse
     */
    public function destroy($identifier)
    {
        $user = $this->repository->find($identifier);

        $this->repository->delete($identifier);

        return $this->responseDeleteSuccess($this->transform($user, UserTransformer::class));
    }
}
