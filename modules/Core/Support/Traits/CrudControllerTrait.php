<?php namespace Zix\Core\Support\Traits;

use Illuminate\Http\Request;

/**
 * Class CrudControllerTrait
 * @package Zix\Core\Support\Traits
 */
trait CrudControllerTrait
{
    /**
     * @var
     */
    protected $model;

    /**
     * Get Dynamic Data Table
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        if($request->get('eloquent') == 'trashed')
        {
            return \Datatables::of($this->model->onlyTrashed())->make(true);
        }

        return \Datatables::of($this->model->query())->make(true);
    }

    /**
     * Get resource By Id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->model->findOrfail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respondRequestAccepted($this->model->withTrashed()->where('id', $id)->updateAction());
    }

}