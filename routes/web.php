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

Route::get('tmp', function() {
   return phpinfo();
});
Route::get('admin/add/site', function() {
    return view('tmp-admin.add-site');
});

Route::post('admin/add/site', function() {
    $file = request()->file('ui');
    $path = $file->move(storage_path('tmp/ui/zips'), $file->getClientOriginalName());
    $zip = new ZipArchive;
    $zip->open($path);
    $zip->extractTo(storage_path('tmp/ui/tmp'));

    return \Site::get(request()->get('site'))->addSiteUiScripts(storage_path('tmp/ui/tmp/public'), request()->get('version'));



    return dd($zipper);
    return view('tmp-admin.add-site');
});

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
