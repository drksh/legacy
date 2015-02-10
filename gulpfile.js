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

    .styles([
        publicPath+"/css/vendor/codemirror/codemirror.css",
        publicPath+"/css/app.css/"
    ], publicPath+"/css/application.css", publicPath+"/css")

    // ACE scripts
    .scripts([
        publicPath+"/js/vendor/codemirror/codemirror.js",
        publicPath+"/js/vendor/codemirror/mod-xml.js",
        publicPath+"/js/vendor/codemirror/mod-css.js",
        publicPath+"/js/vendor/codemirror/mod-clike.js",
        publicPath+"/js/vendor/codemirror/mod-javascript.js",
        publicPath+"/js/vendor/codemirror/mod-htmlmixed.js",
        publicPath+"/js/vendor/codemirror/mod-markdown.js",
        publicPath+"/js/vendor/codemirror/mod-php.js",
        publicPath+"/js/vendor/codemirror/mod-sass.js",
        publicPath+"/js/vendor/jquery.js",
        publicPath+"/js/vendor/bootstrap.js",
        publicPath+"/js/pages/snippets/index.js",
        publicPath+"/js/app.js",
    ], publicPath+"/js/application.js", publicPath+"/js")

    // CACHE assets
    .version([
        "js/application.js",
        "css/application.css"
    ]);


});
