<?php

namespace Zix\Core\Http\Controllers\Forms;

use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Entities\Forms\FormResponse;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class ManageFormResponsesController
 * @package Zix\Core\Http\Controllers\Forms
 * @resource Manage Forms
 */
class ManageFormResponsesController
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
     * Get From Responses
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if($request->get('eloquent') == 'trashed')
        {
            return \Datatables::of($this->form->find($id)->responses()->onlyTrashed())->make(true);
        }

        return \Datatables::of($this->form->find($id)->responses()->get())->make(true);
    }

    /**
     * Get Form Response
     *
     * @param $slug
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        // mark the response as viewed
        return $this->respondWithData([
            'form' => $this->form->where('slug', $slug)->with('fields')->first(),
            'response' => $this->response->where('id', $id)->with('fields')->first()
        ]);
    }

    /**
     * Delete Form Response
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