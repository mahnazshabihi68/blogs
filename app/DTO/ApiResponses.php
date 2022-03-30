<?php

namespace App\DTO;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponses
{
    public static function jsonResponse($data, int $statusCode)
    {
        return response()->json($data, $statusCode);
    }

    public static function successResponse($data, string $message = '', int $statusCode = Response::HTTP_OK): JsonResponse
    {
        $data['status'] = $statusCode;
        $data['message'] = $message;

        return self::jsonResponse($data, $statusCode);
    }

    public static function errorResponse($data, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        $message = Response::$statusTexts[$statusCode];

        $data = [
            'status' => $statusCode,
            'message' => $message,
        ];

        return self::jsonResponse($data, $statusCode);
    }
}
