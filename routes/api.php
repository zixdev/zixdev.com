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
Route::group(['middleware' => ['auth:api']], function ($router) {


    $router->get('/user', function (Request $request) {
        return [
            'data' => 321
        ];
    });
});


Route::post('register', function () {
    $validator = \Validator::make(request()->all(), [

        'username' => 'required|min:3|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 404);
    }
    return response()->json([
        'data' => 'Success'
    ]);
});

