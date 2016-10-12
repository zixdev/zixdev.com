<?php namespace Zix\Core\Libraries\Sites;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Zix\Core\Entities\Site as SiteModel;
class Site
{
    protected $site;
    /**
     * Site constructor.
     */
    public function __construct()
    {
        $this->site = $this->current();
    }

    /*
     * TODO:: should be cached
     */
    public function current()
    {
        // if no site header in the request get the site by url
        if($site = SiteModel::where('url', url('/'))->first())
        {
            return $site;
        }

        // if no site from the request site & from the url return the default client site.
        return 'Site Not Found';
    }

    public function getAll()
    {
        return SiteModel::all(); // TODO it should only get latest enabled websites.
    }

    public function get($id)
    {
        $this->site = SiteModel::find($id);
        return $this;
    }

    /**
     * @param Request $request
     * @param Exception $e
     * @return string
     */
    public function handleMissingRoute(Request $request, Exception $e)
    {
        // check if the routes looking for admin panel

        if(site()->versions()->count())
            return app()->make('Illuminate\Routing\ResponseFactory')->view('zexus.master');
        return app()->make('Illuminate\Routing\ResponseFactory')->view('zexus.install-ui');
    }

    public function addSiteUiScripts($ui_path)
    {
        $this->site->versions()->disable();

        $size = 0;
        $scripts = new Collection();
        $files = \File::files($ui_path);
        foreach ($files as $file) {
            $name = \File::basename($file);
            $contents = \File::get($file);
            $size += \File::size($file);
            if (!str_contains($name, 'gz') && (str_contains($name, 'main') || str_contains($name, 'styles') || str_contains($name, 'inline'))) {
                $scripts->push($name);
            }

            \Storage::put('scripts/' . $this->site->ui . '/' . $this->getNewUiVersion() . '/' . $name, $contents, 'public');
        }
        // create new site version.
        \File::deleteDirectory($ui_path);
        return $this->site->versions()->create([
            'scripts' => $scripts,
            'size'    => get_human_file_size($size),
            'version' => $this->getNewUiVersion()
        ]);
    }

    public function getNewUiVersion()
    {
        $version = $this->site->versions()->count() ? $this->site->versions()->latest()->first()->version : '0.0.0';
        return increment_version($version);
    }


}