<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

Trait ApiResponseTrait
{
    /**
     * @param $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function apiResponse($data = null, int $statusCode): JsonResponse
    {
        return response()->json($data, $statusCode);
    }
}