<?php

namespace Zix\Core\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Zix\Core\Http\Requests\User\UserUpdateRequest;
use Zix\Core\Http\Requests\User\UserUpdateInfoRequest;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class UserController
 * @package Zix\Core\Http\Controllers\Auth
 * @resource Authenticated User
 */
class UserController {

    use ApiResponses;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return $this->respondWithData([
            'user' => $request->user()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        return $this->respondWithData([
            'user' => $request->user()->with('info')->first()
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(UserUpdateRequest $request)
    {
        $request->user()->update($request->only([
            'email', 'username'
        ]));

        return $this->respondWithData([
            'user' => $request->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UserUpdateInfoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(UserUpdateInfoRequest $request)
    {
        if($request->user()->info) {
            $request->user()->info->update($request->input());
        } else {
            $request->user()->info()->create($request->input());
        }

        return $this->respondWithData([
            'user' => $request->user()->with('info')->first()
        ]);
    }




	
}