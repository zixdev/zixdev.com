<?php

namespace Zix\Core\Http\Controllers\Site;

use Illuminate\Http\Request;
use Zix\Core\Entities\Site;
use Zix\Core\Http\Requests\Site\SiteConfigCreateRequest;
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
        $this->site = $site;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->respondWithData($this->site->find($id)->config);
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
    public function store(Request $request, $id)
    {
        $tmp = collect($request->all())->map(function($value, $key) use($id) {
            return $this->site->find($id)->config()->updateOrCreate(
                ['key' => $key],
                [
                    'key' => $key,
                    'value' => $value
                ]
            );
        });
        return $this->respondWithData($tmp);
        return $request->all();
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
