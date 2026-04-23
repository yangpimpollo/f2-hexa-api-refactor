<?php

namespace yangpimpollo\L3_infrastructure\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse {
    protected function success($data, string $message = 'Operación exitosa', int $code = 200): JsonResponse {
        return response()->json([
            'status' => 'success ✅',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error(string $message, int $code, $errors = null): JsonResponse {
        return response()->json([
            'status' => 'error ❌',
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}
