<?php

Route::group(['middleware' => 'api'], function ($router) {


   $router->get('blogs', [
       'uses' => 'ManageBlogController@index',
       'before' => 'can:view_pages'
   ]);

   $router->get('blogs/{id}', [
       'uses' => 'ManageBlogController@show',
       'before' => 'can:view_pages'
   ])->where('id', '[0-9]+');

   $router->post('blogs', [
       'uses' => 'ManageBlogController@store',
       'before' => 'can:create_pages'
   ]);

   $router->put('blogs/{id}', [
       'uses' => 'ManageBlogController@update',
       'before' => 'can:update_pages'
   ]);

   $router->delete('blogs/{id}', [
       'uses' => 'ManageBlogController@destroy',
       'before' => 'can:delete_pages'
   ]);
});
