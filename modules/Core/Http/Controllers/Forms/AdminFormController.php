<?php

namespace Zix\Core\Http\Controllers\Forms;

use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Http\Requests\Forms\CreateFormRequest;
use Zix\Core\Http\Requests\Forms\UpdateFormRequest;
use Zix\Core\Support\Traits\ApiResponses;

class AdminFormController
{
    use ApiResponses;
    /**
     * @var Form
     */
    private $form;

    /**
     * AdminFormController constructor.
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithData($this->form->filtrable());
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
     * @param CreateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request)
    {
        // we need to create new event class
        \Artisan::call('zix:make-event', [
            'name' => 'Forms/SexForm',
            'module' => 'Core'
        ]);
        return $this->respondDataCreated($this->form->create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->form->where('id', $id)->with('fields')->first());
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
     * @param UpdateFormRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, $id)
    {
        return $this->respondRequestAccepted($this->form->findOrFail($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respondRequestAccepted($this->form->withTrashed()->where('id', $id)->updateAction());
    }

}