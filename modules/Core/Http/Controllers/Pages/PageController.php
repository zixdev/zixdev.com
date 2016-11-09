<?php

namespace Zix\Core\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Zix\Core\Entities\Page;
use Zix\Core\Http\Requests\Pages\CreatePageRequest;
use Zix\Core\Support\Traits\ApiResponses;

abstract class PageController
{
    use ApiResponses;
    /**
     * @var Page
     */
    private $page;

    /**
     * PageController constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithData($this->page->filtrable());
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
     * @param CreatePageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {
        return $this->respondDataCreated($this->page->create($request->all())->sites()->sync($request->get('sites')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->page->with('sites')->findOrfail($id));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->respondRequestAccepted($this->page->withTrashed()->where('id', $id)->updateAction());
    }

}