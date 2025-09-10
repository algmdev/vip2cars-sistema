<?php

namespace App\Traits\Response;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function success(string $message = 'Ok', int $statusCode = 200, array $data = []): JsonResponse
    {
        return response()->json([
            'message' => __($message),
            'statusCode' => $statusCode,
            'error' => false,
            'data' => $data
        ], $statusCode);
    }

    public function error(string $message = 'Error', int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'message' => __($message),
            'statusCode' => $statusCode,
            'error' => true,
            'data' => null
        ], $statusCode);
    }

    public function register(string $message = 'Registrado correctamente', int $statusCode = 201): JsonResponse
    {
        return response()->json([
            'message' => __($message),
            'statusCode' => $statusCode,
            'error' => false,
            'data' => null
        ], $statusCode);
    }
}
