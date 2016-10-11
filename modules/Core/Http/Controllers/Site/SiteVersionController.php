<?php

namespace Zix\Core\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ZipArchive;
use Zix\Core\Entities\Site;
use Zix\Core\Http\Requests\Site\SiteUploadVersionRequest;
use Zix\Core\Support\Traits\ApiResponses;
use Illuminate\Support\Facades\Storage;

/**
 * Class SiteVersionController
 * @package Zix\Core\Http\Controllers\Site
 * @resource Site Versions
 */
class SiteVersionController
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
     * Get Site Versions.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->respondWithData($this->site->findOrFail($id)->versions()->latest()->get());
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
     * Upload new version.
     *
     * @param  SiteUploadVersionRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(SiteUploadVersionRequest $request, $id)
    {
        $zip = new ZipArchive;
        $zip->open($request->file('ui'));
        $zip->extractTo(storage_path('tmp/ui/tmp'));

        // create the site ui
        return \Site::get($id)->addSiteUiScripts(storage_path('tmp/ui/tmp/public'));

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