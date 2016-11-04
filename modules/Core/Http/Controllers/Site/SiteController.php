<?php

namespace Zix\Core\Http\Controllers\Site;

use Illuminate\Http\Request;
use Zix\Core\Entities\Site;
use Zix\Core\Http\Requests\Site\SiteCreateRequest;
use Zix\Core\Http\Requests\Site\SiteUpdateRequest;
use Zix\Core\Support\Traits\ApiResponses;

/**
 * Class SiteController
 * @package Zix\Core\Http\Controllers\Site
 * @resource Multi Site
 */
class SiteController
{
    use ApiResponses;
    /**
     * @var Site
     */
    private $site;

    /**
     * SiteController constructor.
     * @param Site $site
     */
    public function __construct(Site $site)
    {
        $this->site = $site;
    }


    /**
     * Get All Sites.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithData($this->site->filtrable());
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
     * Create New Site.
     *
     * @param SiteCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteCreateRequest $request)
    {
        return $this->respondDataCreated($this->site->create($request->all()));
    }

    /**
     * Get Site By Id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respondWithData($this->site->findOrfail($id));
    }

    /**
     * Update Site.
     *
     * @param SiteUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteUpdateRequest $request, $id)
    {
        return $this->respondRequestAccepted($this->site->find($id)->update($request->all()));
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