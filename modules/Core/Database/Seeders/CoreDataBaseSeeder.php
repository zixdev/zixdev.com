<?php

namespace Zix\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Zix\Core\Database\Seeders\SiteDataBaseSeeder;

class CoreDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SiteDataBaseSeeder::class);
    }
}
