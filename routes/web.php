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



Route::get('/', function () {
    return view('master');
});

Route::get('/{name}.js', function($name) {
    return site()->getThemeScripts($name);
});
Route::get('/{name}.{build}.js', function($name, $build) {
    return site()->getThemeScripts($name, $build);
});
Route::get('/{name}.{build}.{type}.js', function($name, $build, $type) {
    return site()->getThemeScripts($name, $build, $type);
});


//
Route::get('test', function() {

    return Site::getSite();

});
//
Auth::routes();
//
Route::get('/home', 'HomeController@index');
