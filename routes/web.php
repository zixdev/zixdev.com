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
    return dd(site()->ui);
});
//
Route::get('test', function() {

    return Site::getSite();

});
//
Auth::routes();
//
Route::get('/home', 'HomeController@index');
