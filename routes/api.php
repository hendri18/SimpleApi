<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api.token'])->group(function () {
	Route::get('/sasuke', function(){
		return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => array(
                	'nama'=>'sasuke',
                	'kelas' => 'ninja'
                	)
                //'hint' => env('REDIS_HOST')
            ], 200);
	});
});

Route::get('/naruto', function(){
	return "string";
});