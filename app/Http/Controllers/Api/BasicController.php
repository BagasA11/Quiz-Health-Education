<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     * 
     */
    public function sendResponse($result, $massage)
    {
        $response = [
            'success'=>true,
            'data'=>$result,
            'massage'=>$massage
        ];
        return response()->json($response, 200);        
    }

    /**
     * return error response
     * @return \Illuminate\Http\Response
     * @param int $status
     */

    public function sendError($error, $errMsg, $status = 404)
    {
        $response = [
            'success'=>false,
            'massage'=>$error
        ];
        if (!empty($errMsg)) {
            $response['data'] = $errMsg;
        }
        return response()->json($response, $status);
    }

}
