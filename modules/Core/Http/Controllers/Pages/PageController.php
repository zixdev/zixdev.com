<?php

namespace Zix\Core\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Zix\Core\Http\Requests\Pages\UpdatePageRequest;
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
        $sites = collect($request->get('sites'))->map(function ($site) {
            return $site['id'];
        })->toArray();
        return $this->respondDataCreated($this->model->create($request->all())->sites()->sync($sites));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!is_int($id)) {
            return $this->respondWithData($this->model->with('sites')->find($id));
        }
        return $this->respondWithData($this->model->with('sites')->where('slug', $id)->first());
    }

    /**
     * @param UpdatePageRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $sites = collect($request->get('sites'))->map(function ($site) {
            return $site['id'];
        })->toArray();
        $this->model->find($id)->sites()->sync($sites);
        return $this->respondRequestAccepted($this->model->find($id)->update($request->all()));
    }


}