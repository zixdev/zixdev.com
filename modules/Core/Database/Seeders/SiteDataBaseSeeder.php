<?php

namespace Zix\Core\Database\Seeders;
use Illuminate\Database\Seeder;
use Zix\Core\Entities\Site;

class SiteDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_url = env('API_DEFAULT_SITE_CLIENT_URL', 'https://zixdev.com');

        Site::create([
            'name'		                => env('API_DEFAULT_SITE_CLIENT', 'Zix Development'),
            'url'		                => $site_url,
            'ui'		                => 'default',
            'public_code'          => md5($site_url),
            'private_code'         => bcrypt($site_url),
            'ssl'		                => ''
        ]);

    }
}
