<?php

namespace Zix\Core\Http\Controllers\Forms;

use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Entities\Forms\FormResponse;
use Zix\Core\Support\Traits\ApiResponses;

class AdminFormResponsesController
{
    use ApiResponses;
    /**
     * @var Form
     */
    private $form;
    /**
     * @var FormResponse
     */
    private $response;

    /**
     * AdminFormResponsesController constructor.
     * @param Form $form
     * @param FormResponse $response
     */
    public function __construct(Form $form, FormResponse $response)
    {
        $this->form = $form;
        $this->response = $response;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return $this->respondWithData($this->form->where('slug', $slug)->first()->responses()->filtrable());
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $response = $this->response->where('id', $id)->with('fields')->first();
        // mark the response as viewed
        return $this->respondWithData([
            'form' => $this->form->where('slug', $slug)->with('fields')->first(),
            'response' => $this->response->where('id', $id)->with('fields')->first()
        ]);
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        return $this->respondRequestAccepted($this->response->withTrashed()->where('id', $id)->updateAction());
    }

}