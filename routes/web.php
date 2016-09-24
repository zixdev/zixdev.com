<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//


//
Route::get('test', function () {
//    return site()->scripts();
    // disable all old versions.
    site()->versions()->disable();


    $version = '1.0.4';

    $scripts = new \Illuminate\Support\Collection();
    $files = \File::files(public_path('assets/default'));

    foreach ($files as $file) {
        $name = \File::basename($file);
        $contents = \File::get($file);
        if (!str_contains($name, 'gz') && (str_contains($name, 'main') || str_contains($name, 'styles') || str_contains($name, 'inline'))) {
            $scripts->push($name);
        }


        Storage::put('scripts/' . site()->ui . '/' . $version . '/' . $name, $contents, 'public');
    }
    // create new site version.

    return site()->versions()->create([
        'scripts' => $scripts,
        'version' => $version
    ]);

});
////
//Auth::routes();
////
//Route::get('/home', 'HomeController@index');
