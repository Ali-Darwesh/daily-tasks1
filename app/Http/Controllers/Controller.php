<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function success($data = null, $message = 'Operation successful', $status = 200)
    {
        return response()->json(data: [
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], status: $status);
    }
    protected function error($data = null, $message = 'Operation failed', $status = 400)
    {
        return response()->json(data: [
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], status: $status);
    }   
}
