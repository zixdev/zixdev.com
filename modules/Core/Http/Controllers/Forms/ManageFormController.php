<?php

namespace Zix\Core\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Http\Requests\Forms\CreateFormRequest;
use Zix\Core\Http\Requests\Forms\UpdateFormRequest;
use Zix\Core\Support\Traits\ApiResponses;
use Zix\Core\Support\Traits\CrudControllerTrait;

/**
 * Class ManageFormController
 * @package Zix\Core\Http\Controllers\Forms
 * @resource Manage Forms
 */
class ManageFormController extends Controller
{
    use ApiResponses, CrudControllerTrait;
    /**
     * @var Form
     */
    private $form;

    /**
     * AdminFormController constructor.
     * @param Form $form
     * @param Form $model
     */
    public function __construct(Form $form, Form $model)
    {
        $this->form = $form;
        $this->model = $model;
    }

    /**
     * Create Forms
     *
     * @param CreateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request)
    {
        // we need to create new event class
        return $this->respondDataCreated($this->form->create($request->all()));
    }

    /**
     * Get Form
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->form->where('id', $id)->with('fields')->first());
    }

    /**
     * Update Form
     *
     * @param UpdateFormRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, $id)
    {
        return $this->respondRequestAccepted($this->form->findOrFail($id)->update($request->all()));
    }


}
