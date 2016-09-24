<?php namespace Zix\Core\Libraries\Sites\Traits;

use Illuminate\Support\Facades\File;

trait HasMultiSitesTrait
{
    public function getTheme()
    {

        return $this->name;
    }

    public function getThemeScripts($name, $build = null, $type = null)
    {
        /** @var TYPE_NAME $name */
        $file = public_path('assets/' . $this->ui . '/' .$name);

        if($build) {
            $file .= '.' . $build;
        }

        if($type) {
            $file .= '.' . $type;
        }

        return (string) require $file . '.js';
    }

}