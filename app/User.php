<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasMediaTrait, HasRoles, SoftDeletes, HasStatusTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'avatar',
        'email', 'email_active', 'email_active_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'email_active_code'
    ];

    /**
     * Get All this user permissions from all him roles
     * @return static
     */
    public function getAllPermissions()
    {
        $permissions = collect();

        $this->roles->map(function ($role) use ($permissions) {
            $role->permissions->map(function ($permission) use ($permissions) {
                $permissions->push($permission->name);
            });
        });

        return $permissions->unique();
    }
}
