<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('token') == '') {
            return response()->json([
                'status' => 403,
                'message' => 'Forbidden',
                'hint' => env('REDIS_HOST')
            ], 403);
        }else if($request->header('token') != env('API_TOKEN')){
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
                //'hint' => env('REDIS_HOST')
            ], 401);
        }else if($request->header('token') == env('API_TOKEN')){
            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Success',
            //     //'hint' => env('REDIS_HOST')
            // ], 200);
            return $next($request);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error',
                'hint' => env('REDIS_HOST')
            ], 500);
        }
        
    }
}
