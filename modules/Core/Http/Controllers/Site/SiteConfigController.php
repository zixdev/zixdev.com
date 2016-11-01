<?php

namespace Zix\Core\Http\Controllers\Site;

use Illuminate\Http\Request;
use Zix\Core\Http\Requests\Site\SiteConfigCreateRequest;
use Zix\Core\Libraries\Sites\Site;
use Zix\Core\Support\Traits\ApiResponses;

class SiteConfigController
{
    use ApiResponses;

    /**
     * @var Site
     */
    private $site;

    /**
     * SiteConfigController constructor.
     * @param Site $site
     */
    public function __construct(Site $site)
    {
        $this->site = $site->current();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $this->site->config()->create([
//            'key'   => 'api.facebook',
//            'value' => 'AZERZERJFGZLFNJ'
//        ]);
        return $this->respondWithData($this->site->config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SiteConfigCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(SiteConfigCreateRequest $request)
    {
        return $this->respondDataCreated($this->site->config()->create($request->only(['key', 'value'])));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

}