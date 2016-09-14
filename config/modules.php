<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */

    'namespace' => 'Zix',

    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path used for save the generated module. This path also will added
        | automatically to list of scanned folders.
        |
        */

        'modules' => base_path('modules/'),
        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules assets path.
        |
        */

        'assets' => public_path('modules'),
        /*
        |--------------------------------------------------------------------------
        | The migrations path
        |--------------------------------------------------------------------------
        |
        | Where you run 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */

        'migration' => base_path('database/migrations'),
        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules generator path.
        |
        */

        'generator' => [
            'config'            => 'Config',
            'command'           => 'Console',
            'migration'         => 'Database/Migrations',
            'seeder'            => 'Database/Seeders',
            'model'             => 'Entities',
            'repository'        => 'Repositories',

            'controller'        => 'Http/Controllers',
            'admin_controller'          => 'Http/Controllers/Admin',
            'web_controller'            => 'Http/Controllers/Web',
            'api_controller'            => 'Http/Controllers/Api',

            'routes'            => 'Http/Routes',


            'filter'            => 'Http/Middleware',
            'request'           => 'Http/Requests',
            'provider'          => 'Providers',

            'lang'              => 'Resources/lang',

            'views'             => 'Resources/views',
            'web_views'                 => 'Resources/views/web',
            'admin_views'               => 'Resources/views/admin',

            'assets'            => 'Resources/assets',

            'js'                => 'Resources/assets/js',
            'web_js'                    => 'Resources/assets/js/web',
            'admin_js'                  => 'Resources/assets/js/admin',

            'css'               => 'Resources/assets/sass',
            'web_css'                   => 'Resources/assets/sass/web',
            'admin_css'                 => 'Resources/assets/sass/admin',

            'test'              => 'Tests',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */

    'stubs' => [
        'enabled' => false,
        'path' =>  config('modules').'/Core/Commands/stubs',
        'files' => [
            'config/admin'                  => 'Config/admin.php',
            'config/api'                    => 'Config/api.php',
            'config/web'                    => 'Config/web.php',

            'http/routes/admin'                  => 'Http/Routes/admin.php',
            'http/routes/api'                    => 'Http/Routes/api.php',
            'http/routes/web'                    => 'Http/Routes/web.php',

            'json' => 'module.json',
            'views/admin/index'             => 'Resources/views/admin/index.blade.php',
            'views/web/index'               => 'Resources/views/web/index.blade.php',

            'assets/sass/app'                 => 'Resources/assets/sass/web/app.scss',
            'assets/js/app'                   => 'Resources/assets/js/web/app.js',
            'assets/sass/app'                 => 'Resources/assets/sass/admin/app.scss',
            'assets/js/app'                   => 'Resources/assets/js/admin/app.js',
        ],
        'replacements'  => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE', 'CLASS', 'NAMESPACE'],
        'replacementsss' => [
            'start' => ['LOWER_NAME'],
            'routes' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['STUDLY_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for composer.json file, generated by this package
    | in every module since version >= 1.2.0.
    |
    */

    'composer' => [
        'vendor' => 'Zix-modules',
        'author' => [
            'name' => 'badi ifaoui',
            'email' => 'badi@zixdev.com',
        ],
    ],


];