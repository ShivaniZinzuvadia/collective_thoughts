const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/js/jquery.min.js',
'public/js')
.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
'public/vendors/bootstrap/css')
.copy('node_modules/bootstrap/dist/js/bootstrap.min.js',
'public/vendors/bootstrap/js' )
.copy('node_modules/bootstrapvalidator/dist/css/bootstrapValidator.min.css',
'public/vendors/bootstrapvalidator/css' )
.copy('node_modules/bootstrapvalidator/dist/js/bootstrapValidator.min.js',
'public/vendors/bootstrapvalidator/js')
.copy('node_modules/shufflejs/dist/shuffle.min.js',
'public/vendors/shufflejs/js');
