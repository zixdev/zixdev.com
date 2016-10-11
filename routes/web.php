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

Route::get('test', function () {
    return get_human_file_size(\File::size(storage_path('app/scripts/default/0.0.2/')));
});
////
//Auth::routes();
////
//Route::get('/home', 'HomeController@index');
