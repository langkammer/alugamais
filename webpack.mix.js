const { mix } = require('laravel-mix');
var bowerFiles = require('main-bower-files');


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
// mix.scripts('bower_components/jquery-maskmoney/dist/jquery.maskMoney.min.js', 'public/js/maskmoney.js');
mix.scripts(bowerFiles('**/*.js'), 'public/js/3rd-party.js');
mix.copy('resources/assets/sass/custom.css','public/css');
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');