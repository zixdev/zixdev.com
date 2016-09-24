<?php namespace Zix\Core\Libraries\Sites;

use Illuminate\Support\Collection;
use Zix\Core\Entities\Site as SiteEntities;
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
        if($site = SiteEntities::where('url', url('/'))->first())
        {
            return $site;
        }

        // if no site from the request site & from the url return the default client site.
        return 'Site Not Found';
    }

    public function getAll()
    {
        return SiteEntities::all(); // TODO it should only get latest enabled websites.
    }

    public function get($id)
    {
        $this->site = SiteEntities::find($id);
        return $this;
    }

    public function addSiteUiScripts($ui_path, $version)
    {
        $this->site->versions()->disable();

        $scripts = new Collection();
        $files = \File::files($ui_path);
        foreach ($files as $file) {
            $name = \File::basename($file);
            $contents = \File::get($file);
            if (!str_contains($name, 'gz') && (str_contains($name, 'main') || str_contains($name, 'styles') || str_contains($name, 'inline'))) {
                $scripts->push($name);
            }


            \Storage::put('scripts/' . $this->site->ui . '/' . $version . '/' . $name, $contents, 'public');
        }
        // create new site version.
        \File::deleteDirectory($ui_path);
        return $this->site->versions()->create([
            'scripts' => $scripts,
            'version' => $version
        ]);
    }


}