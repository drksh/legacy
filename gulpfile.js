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
var publicPath = "public"

elixir(function(mix) {
    // Move vendor packages to appropriate locations
    mix.copy(bowerPath+"/bootstrap-sass-official/assets/stylesheets", resourcePath+"/sass/bootstrap");
    mix.copy(bowerPath+"/bootstrap-sass-official/assets/javascripts/bootstrap.min.js", publicPath+"/js/vendor/bootstrap.js");
    mix.copy(bowerPath+"/bootstrap-sass-official/assets/fonts/bootstrap", publicPath+"/fonts");
    mix.copy(bowerPath+"/jquery/dist/jquery.min.js", publicPath+"/js/vendor/jquery.js")

    // Stylesheets
    mix.sass('app.scss');

    // Scripts
    mix.scripts([
        publicPath+"/js/vendor/ace/theme-tomorrow_night.js",
        publicPath+"/js/vendor/ace/mode-css.js",
        publicPath+"/js/vendor/ace/mode-html.js",
        publicPath+"/js/vendor/ace/mode-less.js",
        publicPath+"/js/vendor/ace/mode-mysql.js",
        publicPath+"/js/vendor/ace/mode-php.js",
        publicPath+"/js/vendor/ace/mode-plain_text.js",
        publicPath+"/js/vendor/ace/mode-scss.js",
        publicPath+"/js/vendor/ace/ace.js"
    ], publicPath+"/js/vendor/ace", null);

});
