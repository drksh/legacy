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
    mix
    .copy(bowerPath+"/bootstrap-sass-official/assets/stylesheets", resourcePath+"/sass/bootstrap")
    .copy(bowerPath+"/bootstrap-sass-official/assets/javascripts/bootstrap.js", publicPath+"/js/vendor/bootstrap.js")
    .copy(bowerPath+"/bootstrap-sass-official/assets/fonts/bootstrap", publicPath+"/fonts")
    .copy(bowerPath+"/jquery/dist/jquery.js", publicPath+"/js/vendor/jquery.js")

    // Stylesheets
    .sass('app.scss')

    // ACE scripts
    .scripts([
        "theme-tomorrow_night.js",
        "mode-css.js",
        "mode-html.js",
        "mode-less.js",
        "mode-mysql.js",
        "mode-php.js",
        "mode-plain_text.js",
        "mode-scss.js",
        "ace.js"
    ], publicPath+"/js/vendor/ace", publicPath+"/js/vendor/ace")

    // VENDOR scripts
    .scripts([
        "jquery.js",
        "bootstrap.js",
        "/ace/all.js"
    ], publicPath+"/js/vendor.js", publicPath+"/js/vendor")

    // CACHE assets
    .version([
        "js/vendor.js",
        "js/app.js",
        "css/app.css"
    ]);


});
