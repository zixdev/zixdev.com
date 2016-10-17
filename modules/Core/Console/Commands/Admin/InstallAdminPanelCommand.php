<?php

namespace Zix\Core\Console\Commands\Admin;

use App\User;
use Illuminate\Database\Console\Migrations\BaseCommand;
use Illuminate\Console\ConfirmableTrait;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
    protected $name = 'zix:install-admin';

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
        $this->createAdminRoles();
        $this->createAdminAccount();

        $this->info('--------------------------------------------');
        $this->info('| Creating Administration Panel             |');
        $this->info('--------------------------------------------');

        $url = $this->ask('Please Specify Admin Panel URL Please:');

        $site = SiteModel::create([
            'name'      => 'Zix Admin Panel',
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

    /**
     * Create admin roles
     */
    private function createAdminRoles()
    {
        $this->info('--------------------------------------------');
        $this->info('| Creating Admin Full Access Role          |');
        $this->info('--------------------------------------------');

        Role::create(['name' => 'admin']);
        Permission::create(['name' => 'full_access']);
        Permission::create(['name' => 'view_admin']);

        $this->info('Administration Roles Created Successfully. ');
    }

    /**
     * create admin account
     */
    private function createAdminAccount()
    {
        $this->info('--------------------------------------------');
        $this->info('| Creating Administration Account          |');
        $this->info('--------------------------------------------');

        $username = $this->ask('Username');
        $email    = $this->ask('Email Address');
        $password = $this->secret('Password');

        $user = User::create([
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'email_active'  => true
        ]);

        $user->assignRole('admin');
        $user->givePermissionTo('full_access');
        $user->givePermissionTo('view_admin');

        $this->info('Congrats '. $username . ' You successfully created an admin account !');
    }
}
