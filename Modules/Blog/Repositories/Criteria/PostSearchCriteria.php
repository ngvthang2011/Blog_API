<?php

namespace Modules\Blog\Repositories\Criteria;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class PostSearchCriteria implements CriteriaInterface
{
    protected $repository;
    protected $request;

    /**
     * PostSearchCriteria constructor.
     * @param Request $request
     */
    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        /** tìm kiếm theo tiêu đề */
        if($this->request->get('title')) {
            $model = $model->where('title', 'LIKE', '%'.$this->request->get('title').'%');
        }

        return $model;
        // TODO: Implement apply() method.
    }
}
