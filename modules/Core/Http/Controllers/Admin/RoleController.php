<?php

namespace Zix\Core\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Zix\Core\Entities\Permission;
use Zix\Core\Entities\Role;
use Zix\Core\Support\Traits\ApiResponses;
use Zix\Core\Support\Traits\CrudControllerTrait;

/**
 * Class RoleController
 * @package Zix\Core\Http\Controllers\Admin
 */
class RoleController
{

    use ApiResponses, CrudControllerTrait, ValidatesRequests;
    /**
     * @var Permission
     */
    private $permission;


    /**
     * RoleController constructor.
     * @param Role $model
     * @param Permission $permission
     */
    public function __construct(Role $model, Permission $permission)
    {
        $this->model = $model;
        $this->permission = $permission;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3|max:255']);
        return $this->respondDataCreated($this->model->create($request->all()));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->model->find($id);
        $this->validate($request, ['name' => 'required|min:3|max:255|unique:roles,id,' . $model->id]);
        return $this->respondRequestAccepted($model->update($request->all()));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function permissions()
    {
        return $this->respondWithData($this->permission->all());
    }

    /**
     * Get resource By Id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->respondWithData($this->model->findOrfail($id));
    }

    /**
     * Get resource By Id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->model->with('permissions')->findOrfail($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePermissions(Request $request, $id)
    {
        $role = $this->model->find($id);
        $role->permissions()->detach();
        collect($request->all())->filter(function ($permission) {
            return $permission;
        })->map(function ($permission, $key) use ($role, $request) {
            $role->givePermissionTo($key);
        });
        return $this->respondRequestAccepted($role->permissions);
    }
}