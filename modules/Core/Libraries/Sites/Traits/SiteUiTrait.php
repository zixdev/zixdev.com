<?php namespace Zix\Core\Libraries\Sites\Traits;


/**
 * Class SiteUiTrait
 * @package Zix\Core\Libraries\Sites\Traits
 */
trait SiteUiTrait
{
    /**
     * @param $ui_path
     * @return mixed
     */
    public function addSiteUiScripts($ui_path)
    {
        $this->site->versions()->disable();


        $scripts = $this->storeUiScripts($ui_path);
        $this->storeUiAssets($ui_path);


        // create new site version.
        return $this->site->versions()->create([
            'scripts'   => $scripts->get('scripts'),
            'size'      => $scripts->get('size'),
            'version'   => $this->getNewUiVersion()
        ]);
    }

    /**
     * @return string
     */
    public function getNewUiVersion()
    {
        return increment_version(
            $this->site->versions()->count() ?
            $this->site->versions()->latest()->first()->version :
            '0.0.0'
        );
    }

    /**
     * @param $ui_path
     * @return Collection
     */
    private function storeUiScripts($ui_path)
    {
        $size = 0;
        $scripts = collect();

        $files = \File::files($ui_path);

        foreach ($files as $file) {
            $name = \File::basename($file);
            $contents = \File::get($file);

            if (!str_contains($name, 'gz') && (str_contains($name, 'main') || str_contains($name, 'styles') || str_contains($name, 'inline'))) {
                $size += \File::size($file);
                $scripts->push($name);
            }

            \Storage::put('scripts/' . $this->site->ui . '/' . $this->getNewUiVersion() . '/' . $name, $contents, 'public');
        }

        return collect([
            'scripts'   => $scripts,
            'size'      => get_human_file_size($size)
        ]);
    }


    private function storeUiAssets($ui_path)
    {
        \File::copyDirectory($ui_path . '/assets/' . $this->site->ui, storage_path('app/scripts/'. $this->site->ui . '/' . $this->getNewUiVersion() . '/assets'));
        \File::copyDirectory($ui_path . '/assets/' . $this->site->ui, public_path('assets/'. $this->site->ui));
        \File::deleteDirectory($ui_path);
        return true;
    }
}