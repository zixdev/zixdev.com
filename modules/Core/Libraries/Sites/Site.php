<?php namespace Zix\Core\Libraries\Sites;

use Zix\Core\Entities\Site as SiteEntities;
class Site
{

    /**
     * Site constructor.
     */
    public function __construct()
    {

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

    public function getTheme()
    {
        
    }


}