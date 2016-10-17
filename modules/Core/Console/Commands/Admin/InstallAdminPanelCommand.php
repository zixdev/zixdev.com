<?php

namespace Zix\Core\Console\Commands\Admin;

use Illuminate\Database\Console\Migrations\BaseCommand;
use Illuminate\Console\ConfirmableTrait;
use Zix\Core\Entities\Site as SiteModel;
use ZipArchive;

class InstallAdminPanelCommand extends BaseCommand
{

    use ConfirmableTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zix:install-admin-panel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install All Zexus Application.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('--------------------------------------------');
        $this->info('| Creating Administration Panel             |');
        $this->info('--------------------------------------------');

        $url = $this->ask('Please Specify Admin Panel URL Please:');

        $site = SiteModel::create([
            'name'      => 'x Admin Panel',
            'url'       => $url,
            'ui'        => 'admin'
        ]);

        $zip = new ZipArchive;
        $zip->open(storage_path('zexus/admin.zip'));// get the zip file;
        $zip->extractTo(storage_path('tmp/ui/tmp'));

        // create the site ui
        if(\Site::get($site->id)->addSiteUiScripts(storage_path('tmp/ui/tmp/public')))
            $this->info ('Administration Panel Created Successfully');

    }
}
