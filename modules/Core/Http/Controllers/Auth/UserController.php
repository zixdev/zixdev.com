<?php

namespace Zix\Core\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Zix\Core\Events\User\UserRegistered;
use Zix\Core\Http\Requests\User\UserChangePasswordRequest;
use Zix\Core\Http\Requests\User\UserCreateRequest;
use Zix\Core\Http\Requests\User\UserUpdateRequest;
use Zix\Core\Http\Requests\User\UserUpdateInfoRequest;
use Zix\Core\Notifications\User\ActivateYourEmail;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class UserController
 * @package Zix\Core\Http\Controllers\Auth
 * @resource Authenticated User
 */
class UserController {

    use ApiResponses;
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respondWithData($this->user->filtrable());
    }

    /**
     * Get Site By Id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->user->findOrfail($id));
    }

    /**
     * @param UserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return $this->respondRequestAccepted($this->user->find($id)->update($request->all()));
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserCreateRequest $request)
    {
        $user = $this->user->create([
            'username'      => $request->get('username'),
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
            'active_code'   => str_random(60)
        ]);

        // fire event user created.
        event(new UserRegistered($user));

        return $this->respondDataCreated($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respondRequestAccepted($this->user->withTrashed()->where('id', $id)->updateAction());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return $this->respondWithData([
            'user' => $request->user(),
            'permissions'  => $request->user()->permissions()->pluck('name')
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
            'user' => $request->user()->with('info')->first(),
            'email_active' => false
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(UserUpdateRequest $request)
    {
        // if the user updated him email, he should activate it.
        if ($request->user()->email != $request->get('email')) {
            $request->user()->update([
                'email_active_code'   => str_random(60),
                'email'         => $request->get('email'),
                'username'      => $request->get('username'),
                'email_active'  => false
            ]);

            $request->user()->notify(new ActivateYourEmail($request->user()));

            return $this->respondWithData([
                'user' => $request->user(),
                'message' => 'We have sent you an email to confirm your new address Email'
            ]);

        }

        $request->user()->update($request->only([
            'email', 'username'
        ]));

        return $this->respondWithData([
            'user' => $request->user(),
            'message' => 'Your Account Was Successfully updated'
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


    /**
     * @param UserChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(UserChangePasswordRequest $request)
    {
        if (! Hash::check($request->current_password, $request->user()->password)) {
            return response()->json(
                ['current_password' => ['The current password you provided is incorrect.']], 422
            );
        }

        $request->user()->password = Hash::make($request->password);
        $request->user()->save();

        return $this->respondWithData([
            'message' => 'Your Password Been Updated!'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAvatar(Request $request)
    {
        $image_url = $request->user()->addMedia($request->file('avatar'))->toCollection('images')->getUrl();
        $request->user()->update([
            'avatar' => url($image_url)
        ]);
        return $this->respondWithData([
            'user' => $request->user()
        ]);
    }

    public function selectAvatar(Request $request)
    {
        $request->user()->update([
            'avatar' => $request->get('url')
        ]);
        return $this->respondWithData([
            'user' => $request->user()
        ]);
    }

    public function images(Request $request)
    {
        return $this->respondWithData([
            'images' => $request->user()->getMedia()->map(function($image) {
                return [
                    'url' => url($image->getUrl()),
                    'name' => $image->file_name
                ];
            })
        ]);
    }

	
}