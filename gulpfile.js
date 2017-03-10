var elixir = require('laravel-elixir');
var bowerFiles = require('main-bower-files');

elixir(function(mix) {
    mix.sass('resources/assets/sass/app.scss', 'public/css');
    mix.scripts(bowerFiles('**/*.js'), 'public/js/3rd-party.js', '/');
    mix.scriptsIn('', 'public/js/app.js');
});
// elixir(function(mix) {
//     // mix.sass('resources/assets/sass/app.scss', 'public/css');
//     // mix.copy('bower_components/angular/*.*', 'public/js/angular/', '/');
//     // mix.copy('bower_components/angular-input-masks/*.*', 'public/js/angular-input-masks/', '/');
//     // mix.copy('bower_components/bootstrap-sass/*.*', 'public/js/bootstrap-sass/', '/');
//     // mix.copy('bower_components/bootstrap/*.*', 'public/js/bootstrap/', '/');
//     //
//     // mix.copy('bower_components/lodash/*.*', 'public/js/lodash/', '/');
//     mix.scriptsIn(bowerFiles('**/*.js'), 'public/js/lib.js', '/');
//     mix.scriptsIn('', 'public/js/app.js');
// });
