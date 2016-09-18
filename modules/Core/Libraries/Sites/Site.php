<?php namespace Zix\Core\Libraries\Sites;

use Zix\Core\Entities\Site as SiteEntities;
class Site
{
    private $site_code;

    /**
     * Site constructor.
     * @param $site_code
     */
    public function __construct($site_code)
    {
        $this->site_code = $site_code;
    }

    /*
     * TODO:: should be cached
     */
    public function getSite()
    {
        if($this->site_code) {
            return SiteEntities::where('site_public_code', $this->site_code)->first();
        }
        // if no site header in the request get the site by url
        if($site = SiteEntities::where('url', url('/'))->first())
        {
            return $site;
        }

        // if no site from the request site & from the url return the default client site.
        return SiteEntities::where('site_public_code', md5(env('API_DEFAULT_SITE_CLIENT_URL')))->first();
    }


}