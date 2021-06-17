<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\JsonResponse;

/**
 * ScheduleSupport ResponseTrait
 * @package App\Http\Controllers\Api\Traits
 */
trait ResponseTrait
{
    /**
     * @param array $data
     * @param int $code
     * @param string $message
     * @return JsonResponse
     */
    protected function responseSuccess($data = [], $code = 200, $message = "")
    {
        return response()->json(array_merge_recursive([
            'meta' => [
                'code' => $code,
                'message' => $message != "" ? $message : $this->getMessage($code)
            ]
        ], $this->formatData($data)));
    }

    /**
     * @param int $code
     * @param string $message
     * @param null $data
     * @return JsonResponse
     */
    protected function responseErrors($code = 400, $message = "", $data = null)
    {
        return response()->json(array_merge_recursive([
            'meta' => [
                'code' => $code,
                'message' => $message ?? $this->getMessage($code)
            ]
        ], $this->formatData($data)))->setStatusCode($code);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function responseBadRequest($message = null)
    {
        return $this->responseErrors('400', $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function responseNotFound($message = null)
    {
        return $this->responseErrors('404', $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function responseInternalServerError($message = null)
    {
        return $this->responseErrors('500', $message);
    }

    /**
     * @param array $data
     * @param int $code
     * @param string $message
     * @return JsonResponse
     */
    protected function responseDeleteSuccess($data = [], $code = 410, $message = "")
    {
        return response()->json(array_merge_recursive([
            'meta' => [
                'code' => $code,
                'message' => $message != "" ? $message : $this->getMessage($code)
            ]
        ], $this->formatData($data)));
    }

    /**
     * @param $code
     * @return string
     */
    protected function getMessage($code)
    {
        switch ($code) {
            case 400:
                $message = 'Invalid data';
                break;
            case 401:
                $message = 'Unauthorized';
                break;
            case 404:
                $message = 'Not found';
                break;
            case 500:
                $message = 'Internal Server Error';
                break;
            case 200:
                $message = 'Success';
                break;
            case 410:
                $message = 'Deleted Success';
                break;
            default:
                $message = '';
        }
        return $message;
    }

    protected function formatData($data)
    {
        return is_array($data) && array_key_exists('data', $data)
            ? $data
            : ['data' => $data];
    }
}
