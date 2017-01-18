<?php

namespace Zix\Core\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Zix\Core\Support\Traits\CrudControllerTrait;
use Zix\Core\Entities\Page;
use Zix\Core\Http\Requests\Pages\CreatePageRequest;
use Zix\Core\Support\Traits\ApiResponses;

class PageController
{
    use ApiResponses, CrudControllerTrait;

    /**
     * PageController constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {
        return $this->respondDataCreated($this->page->model($request->all())->sites()->sync($request->get('sites')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_int($id))
            return $this->respondWithData($this->model->with('sites')->findOrfail($id));
        return $this->respondWithData($this->model->with('sites')->where('slug', $id)->first());
    }



}