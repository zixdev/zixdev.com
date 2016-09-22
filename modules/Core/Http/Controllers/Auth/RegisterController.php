<?php

namespace Zix\Core\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Zix\Core\Events\User\UserRegistered;
use Zix\Core\Http\Requests\User\UserActivateEmailRequest;
use Zix\Core\Http\Requests\User\UserCreateRequest;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class RegisterController
 * @package Zix\Core\Http\Controllers\Auth
 * @resource Authentication
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
     * Register new user.
     *  When the submit a register form we will be creating new account for him,
     * also we will be sending to him and email with link to activate him account.
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

    /**
     * Activate User's account.
     * @param UserActivateEmailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activateAccount(UserActivateEmailRequest $request)
    {
        $user = User::where('active_code', $request->get('active_code'))->where('active', false)->first();
        if($user) {
            $user->active_code = null;
            $user->active = true;
            $user->save();

            // remove the old token.
            $user->tokens()->where('name', $request->header('User-Agent'))->delete();

            return $this->respondWithData([
                'token' => $user->createToken($request->header('User-Agent'))->accessToken,
                'user'  => $user,
                'message' => 'Your account was successfully activated'
            ]);
        }

        return $this->respondNotFound('<b>Oops</b> looks like something went wrong .<br> Please check your link or try again later !');
    }


}
