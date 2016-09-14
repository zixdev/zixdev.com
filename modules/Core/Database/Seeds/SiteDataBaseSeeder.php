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
        $site = Site::create([
            'name'		=> 'Zix Development',
            'slug'		=> 'zix-development',
            'ui'		=> 'default',
            'url'		=> 'http://localhost:8000/',
            'ssl'		=> ''
        ]);

//        $site->seo()->create([
//            'title'         => 'Zix Development',
//            'description'   => 'The future of web development',
//            'keywords'      => 'Technology, Development, Web, Marketing'
//        ]);
    }
}
