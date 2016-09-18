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


use Zix\Core\Events\User\UserRegistered;

Route::get('/', function () {
    return view('welcome');
});
//
Route::get('test', function() {

    $user = App\User::first();
    event(new UserRegistered($user));
//    $user->notify(new \Zix\Core\Notifications\User\ActivateYourAccount($user));

});
//
Auth::routes();
//
Route::get('/home', 'HomeController@index');
