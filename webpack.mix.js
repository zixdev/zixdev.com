const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/zixdev/js/app.js', 'public/assets/zixdev/js')
    .sass('resources/assets/zixdev/sass/app.scss', 'public/assets/zixdev/css');

mix.js('resources/assets/default/js/app.js', 'public/assets/default/js')
    .sass('resources/assets/default/sass/app.scss', 'public/assets/default/css');

mix.js('resources/assets/admin/js/app.js', 'public/assets/admin/js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/assets/admin/css')