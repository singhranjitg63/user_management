<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Success Response
     */
    protected function sendResponse($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'error' => false,
            'message' => $message,
            'code' => $code,
            'data' => $data
        ], $code);
    }

    /**
     * Error Response
     */
    protected function sendError($message, $code = 500)
    {
        return response()->json([
            'error' => true,
            'message' => $message,
            'code' => $code
        ], $code);
    }

    /**
     * Unauthenticated Response
     */
    protected function unauthenticated()
    {
        return $this->sendError('Unauthenticated', 401);
    }
}