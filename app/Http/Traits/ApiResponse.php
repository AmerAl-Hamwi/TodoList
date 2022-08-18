<?php

namespace App\Http\Traits;

/**
 * this trait has a apiResponse method
 * that format the response in good way
 */
trait ApiResponse
{
    public function apiResponse($data = NULL, $status = NULL, $msg = NULL)
    {
        $arr = [
            'data' => $data,
            'status' => $status,
            'msg' => $msg,
        ];
        return response()->json($arr, $status);
    }
}
