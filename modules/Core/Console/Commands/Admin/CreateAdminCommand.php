<?php

namespace Zix\Core\Console\Commands\Admin;

use App\User;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Console\Migrations\BaseCommand;

class CreateAdminCommand extends BaseCommand
{

    use ConfirmableTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zix:create-admin-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Full Admin Access User';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('--------------------------------------------');
        $this->info('| Creating Administration Account          |');
        $this->info('--------------------------------------------');

        $username = $this->ask('Username');
        $email = $this->ask('Email Address');
        $password = $this->secret('Password');

        $user = User::create([
            'username'      => $username,
            'email'         => $email,
            'password'      => bcrypt($password),
            'active'        => true
        ]);

        $user->assignRole('admin');
        $user->givePermissionTo('full_access');

        $this->info('Congrats '. $username . ' You successfully created an admin account !');
    }

}