<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponses
{
    public function jsonResponse(mixed $data, int $statusCode)
    {
        return response()->json($data, $statusCode);
    }

    public function successResponse(mixed $data = null, string $message = '', int $statusCode = Response::HTTP_OK): JsonResponse
    {
        $data['status'] = $statusCode;
        $data['message'] = $message;
        return $this->jsonResponse($data, $statusCode);
    }

    public function errorResponse(mixed $data, string $message = '', int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        if (!$data) {
            $message = Response::$statusTexts[$statusCode];
        }

        $data = [
            'message' => $message,
            'errors' => $data,
        ];

        return $this->jsonResponse($data, $statusCode);
    }
}