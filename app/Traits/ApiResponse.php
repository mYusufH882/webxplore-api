<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($data, $message = 'Data Successed!', $status = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function errorResponse($error, $message = "Operasi Gagal!!!", $status = 500)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $error
        ]);
    }
}