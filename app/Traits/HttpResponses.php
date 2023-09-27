<?php

namespace App\Traits;

trait HttpResponses{
    protected function success($data, $code = 200){
        return response()->json([
            'status' => 'Request was successful.',
            'data' => $data
        ], $code);
    }

    protected function error($data, $message = null, $code){
        return response()->json([
            'status' => 'Request was unsuccessful.',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
