<?php

namespace Zix\Core\Console\Commands\Admin;

use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Console\Migrations\BaseCommand;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminFullAccessRoleCommand extends BaseCommand
{

	use ConfirmableTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'zix:create-admin-full-access-role';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Make Full Admin Access Role';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->info('--------------------------------------------');
		$this->info('| Creating Admin Full Access Role          |');
		$this->info('--------------------------------------------');

		Role::create(['name' => 'admin']);
		Permission::create(['name' => 'full_access']);

		$this->info('Administration Roles Created Successfully. ');
	}

}