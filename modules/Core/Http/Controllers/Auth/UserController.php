<?php

namespace Zix\Core\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Zix\Core\Http\Requests\User\Update;
use Zix\Core\Http\Requests\User\UpdateInfo;
use Zix\Core\Support\Traits\ApiResponses;

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
     * @param Update $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Update $request)
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
     * @param Update|UpdateInfo $request
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(UpdateInfo $request)
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