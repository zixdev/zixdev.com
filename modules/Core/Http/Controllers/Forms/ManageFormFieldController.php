<?php

namespace Zix\Core\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Entities\Forms\FormField;
use Zix\Core\Support\Traits\ApiResponses;
use Zix\Core\Support\Traits\CrudControllerTrait;

/**
 * Class ManageFormFieldController
 * @package Zix\Core\Http\Controllers\Forms
 * @resource Manage Forms
 */
class ManageFormFieldController extends Controller
{
    use ApiResponses, CrudControllerTrait;
    /**
     * @var Form
     */
    private $form;
    /**
     * @var int
     */
    private $order = 0;
    /**
     * @var FormField
     */
    private $field;

    /**
     * AdminFormFieldController constructor.
     * @param Form $form
     * @param FormField $field
     */
    public function __construct(Form $form, FormField $field)
    {
        $this->form = $form;
        $this->field = $field;
    }


    /**
     * Get Form Fields
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithData($this->field->filtrable());
    }

    /**
     * Create Form Fields
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $form = $this->form->find($id);
        $form->fields()->detach();

        collect($request->all())->map(function ($field) use ($form) {

            # 1. look in db do we have similar field ?
            $db_field = $this->field->firstOrCreate(['name' => $field['name']], $field);
            $form->fields()->save($db_field, ['order' => $this->order]);

            $this->order = $this->order + 1;
        });

        return $this->respondDataCreated($form->with('fields')->get());
    }

    /**
     * Update Form Fields
     *
     * @param  \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $form = $this->form->where('slug', $slug)->first();

        collect($request->all())->map(function ($field) use ($form) {
            $form->fields()->where('name', $field->name)->first()->updateOrCreate($field);
        });

        return $this->respondDataCreated($form);
    }


}