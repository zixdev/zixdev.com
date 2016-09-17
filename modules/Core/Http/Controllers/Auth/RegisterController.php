<?php

namespace Zix\Core\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Zix\Core\Http\Requests\User\UserRequestCreate;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class RegisterController
 * @package Zix\Core\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use ApiResponses;

    /**
     * @var User
     */
    private $user;

    /**
     * RegisterController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param UserRequestCreate $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequestCreate $request)
    {

        $user = $this->user->create([
            'username'      => $request->get('username'),
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password'))
        ]);

        // fire event user created.

        return $this->respondDataCreated([
            'token' => $user->createToken($request->header('User-Agent'))->accessToken,
            'user' => $user
        ]);
    }


}
