<?php

// related js
Route::get('/{name}.js', function($name) {
    return site()->getThemeScripts($name);
});
Route::get('/{name}.{build}.js', function($name, $build) {
    return site()->getThemeScripts($name, $build);
});
Route::get('/{name}.{build}.{type}.js', function($name, $build, $type) {
    return site()->getThemeScripts($name, $build, $type);
});
Route::get('/{name}.{build}.{type}.map', function($name, $build, $type) {
    return site()->getThemeScripts($name, $build, $type, '.map');
});
