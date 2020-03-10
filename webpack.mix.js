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

mix.js('resources/js/app.js', 'public/js');
    //.sass('resources/sass/app.scss', 'public/css');
	
//mix.stylus('resources/css/app1.css', 'public/css/app1.css');













/*mix.scripts([
	//'resources/js/jquery-3.2.1.min.js',
	'resources/js/bootstrap.js',
	//'resources/js/toastr.js',
	'resources/js/vue.js',
	'resources/js/axios.js',
	'resources/js/appBrand.js',
	'resources/js/appCategory.js',
	//'resources/js/appClient.js',
	], 'public/js/app.js'
);*/
