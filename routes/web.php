<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return site()->view('core::%s.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', function() {
    return view('layouts.admin');
});
//
Route::get('test', function() {
    return site()->view('core::%s.layouts.master');
    return view('core::default.layouts.master');
});