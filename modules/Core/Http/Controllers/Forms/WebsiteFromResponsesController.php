<?php

namespace Zix\Core\Http\Controllers\Forms;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class WebsiteFromResponsesController
 * @package Zix\Core\Http\Controllers\Forms
 */
class WebsiteFromResponsesController
{
    use ApiResponses, ValidatesRequests;
    /**
     * @var Form
     */
    private $form;


    /**
     * WebsiteFromResponsesController constructor.
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(Request $request)
    {
        // get form by slug
        $form = $this->form->where('slug', $request->get('form_name'))->first();

        // use dynamic validator
        $this->validate($request, $this->getRules($form));

        // create the form
        $response = $this->createNewResponse($request, $form);

        //  fire new event


        return $this->respondDataCreated($response);
    }

    /**
     * @param $form
     * @return array
     */
    private function getRules($form)
    {
        $rules = [];
        foreach ($form->fields as $field) {
            $r = '';
            foreach ($field->rules as $rule) {
                $r .= $rule->name . ':' . $rule->value . '|';
            }
            $rules[$field->name] = $r;
        }
        return $rules;
    }

    /**
     * @param Request $request
     * @param $form
     * @return mixed
     */
    protected function createNewResponse(Request $request, $form)
    {
        $response = $form->responses()->create([
            'identifier' => $form->slug . '-' . time(),
            'site_id' => 1
        ]);

        $fields = [];

        foreach ($form->fields as $field) {
            $fields[] = [
                'form_field_id' => $field->id,
                'value' => $request->get($field->name)
            ];
        }

        foreach ($fields as $field) {
            $response->fields()->create($field);
        }
        return $response;
    }

}