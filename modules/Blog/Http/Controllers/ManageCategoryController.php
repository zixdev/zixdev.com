<?php

namespace Zix\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Zix\Blog\Entities\BlogCategory;
use Zix\Blog\Http\Requests\CreateCategoryRequest;
use Zix\Blog\Http\Requests\UpdateCategoryRequest;
use Zix\Core\Events\Seo\CreateSeoRelation;
use Zix\Core\Events\Seo\UpdateSeoRelation;
use Zix\Core\Events\Site\CreateSiteRelation;
use Zix\Core\Support\Traits\ApiResponses;
use Zix\Core\Support\Traits\CrudControllerTrait;

class ManageCategoryController
{
    use ApiResponses, CrudControllerTrait;

    /**
     * PageController constructor.
     * @param BlogCategory $model
     */
    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    /**
     * Create Page
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $model = $this->model->create($request->input());
        event(new CreateSeoRelation($model, $request));
        event(new CreateSiteRelation($model, $request));

        return $this->respondDataCreated($model);
    }

    /**
     * Get Page
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->model->with(['sites', 'seo', 'parent'])->find($id));
    }

    /**
     * Update Page
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $model = $this->model->find($id);
        event(new CreateSiteRelation($model, $request));
        event(new UpdateSeoRelation($model, $request));
        return $this->respondRequestAccepted($model->update($request->all()));
    }


}