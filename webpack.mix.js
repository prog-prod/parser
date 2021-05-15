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

mix.js('resources/common/master.js', 'public/assets/js/app.min.js').version()
    .js('resources/common/assets/libs/bootstrap/js/bootstrap.bundle.min.js', 'public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')
    .js('resources/common/assets/js/app.js', 'public/assets/js/template.min.js')
    .js('resources/common/assets/libs/metismenu/metisMenu.min.js', 'public/assets/libs/metismenu/metisMenu.min.js')
    .js('resources/common/assets/libs/node-waves/waves.min.js', 'public/assets/libs/node-waves/waves.min.js')
    .styles('resources/common/assets/css/theme.min.css', 'public/assets/css/theme.min.css')
    .styles('resources/common/assets/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css')
    .styles('resources/common/assets/css/icons.min.css', 'public/assets/css/icons.min.css')
    .styles('resources/common/assets/css/app.min.css', 'public/assets/css/template.min.css')
    .vue();

if (mix.inProduction()) {
    mix.version();
}
