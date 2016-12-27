<?php

namespace Zix\Core\Http\Controllers\Forms;

use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Entities\Forms\FormField;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class AdminFormFieldController
 * @package Zix\Core\Http\Controllers\Forms
 */
class AdminFormFieldController
{
    use ApiResponses;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithData($this->field->filtrable());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $form = $this->form->where('slug', $slug)->first();
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'field';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}