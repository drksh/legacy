var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var bowerPath = "vendor/bower_components";
var resourcePath = "resources/assets";

elixir(function(mix) {
    mix.sass('app.scss');

    mix.copy(bowerPath+"/bootstrap-sass-official/assets/stylesheets", resourcePath+"/sass/bootstrap");
});
