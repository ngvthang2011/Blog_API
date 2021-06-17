<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Transformers\CanTransform;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BaseApiController
 * @property BaseRepository $repository
 * @package App\Http\Controllers\Api
 */
abstract class BaseApiController extends Controller
{
    use ResponseTrait, CanTransform;
}
