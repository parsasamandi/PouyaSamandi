const mix = require('laravel-mix');
const CompressionPlugin = require('compression-webpack-plugin');

mix.setPublicPath('public');
mix.setResourceRoot('../');


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

// Cv And Project
mix.styles('resources/assets/sass/_cvProject.scss','public/css/cvProj.css')
    // Authentication
    .styles('resources/assets/sass/_auth.scss','public/css/auth.css')
    // Admin Style
    .styles('resources/assets/sass/_admin.scss','public/css/admin.css')
    // Main Css
    .styles('resources/assets/sass/_index.scss', 'public/css/index.css')
    // Main Js
    .scripts('resources/assets/js/main.js','public/js/main.js')
    // Ajax Request Handler
    .scripts('resources/assets/js/RequestHandler.js', 'public/js/RequestHandler.js')
    // App (Js)
    .js('resources/assets/js/app.js', 'public/js')
    // App (Css)
    .sass('resources/assets/sass/app.scss', 'public/css')
    // Images
    .copy('resources/assets/images', 'public/images');

mix.version();
mix.extract();
mix.disableNotifications();
