<?php

namespace Zix\Core\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Zix\Core\Support\Traits\ApiResponses;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Zix\Core\Http\Requests\User\UserResetPasswordRequest;

class ResetPasswordController extends Controller
{
    protected $user;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, ApiResponses;

    /**
     * Reset the given user's password.
     *
     * @param  UserResetPasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function reset(UserResetPasswordRequest $request)
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $request->input(), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );


        // If the password was successfully reset, we return success response message.
        if ($response == Password::PASSWORD_RESET) {
            //  clean user tokens
            $this->user->tokens()->delete();

            return $this->respondDataCreated([
                'token' => $this->user->createToken($request->header('User-Agent'))->accessToken,
                'user' => $this->user,
                'message' => trans($response)
            ]);
        }

        return  $this->respondBadRequest(trans($response));
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword $user
     * @param  string $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->user = $user;
        return $user->forceFill([
            'password' => bcrypt($password)
        ])->save();;
    }

}
