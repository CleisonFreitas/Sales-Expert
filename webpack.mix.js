const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js','resources/js/sb-admin-2.min.js','resources/js/dataTables.bootstrap4.min.js','resources/js/jquery.dataTables.js','public/js').postCss('resources/css/app.css','resources/css/sb-admin-2.min.css','resources/css/dataTables.bootstrap4.min.css', 'public/css' ,[
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
