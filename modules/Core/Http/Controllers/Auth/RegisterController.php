<?php

namespace Zix\Core\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Zix\Core\Events\User\UserRegistered;
use Zix\Core\Http\Requests\User\UserCreateRequest;
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
     * Handle a registration request for the application.
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserCreateRequest $request)
    {

        $user = $this->user->create([
            'username'      => $request->get('username'),
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
            'active_code'   => str_random(60)
        ]);

        // fire event user created.
        event(new UserRegistered($user));

        return $this->respondDataCreated([
            'token' => $user->createToken($request->header('User-Agent'))->accessToken,
            'user' => $user
        ]);
    }


}
