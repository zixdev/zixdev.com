<?php

namespace Zix\Blog\Http\Controllers;

use Zix\Blog\Entities\Blog;
use Zix\Blog\Http\Requests\CreateBlogRequest;
use Zix\Blog\Http\Requests\UpdateBlogRequest;
use Zix\Core\Support\Traits\ApiResponses;
use Zix\Core\Support\Traits\CrudControllerTrait;

class ManageBlogController
{
    use ApiResponses, CrudControllerTrait;

    /**
     * PageController constructor.
     * @param Blog $model
     */
    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    /**
     * Create Page
     *
     * @param CreateBlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        return $request->url();
        $model = new Blog();
        $model->user_id = 1;
        $model->fill($request->all());
        $model->save();
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
        return $this->respondWithData($this->model->with(['sites', 'seo', 'category'])->find($id));
    }

    /**
     * Update Page
     * @param UpdateBlogRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $model = $this->model->find($id);
        event(new CreateSiteRelation($model, $request));
        event(new UpdateSeoRelation($model, $request));
        return $this->respondRequestAccepted($model->update($request->all()));
    }


}