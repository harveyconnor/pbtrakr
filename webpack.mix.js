const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/plugins/switchery/switchery.min.css','public/css/plugins/switchery.min.css')
    .styles('resources/assets/css/style.css','public/css/style.css')
    .copy('resources/assets/js/theme/modernizr.min.js', 'public/js')
    .copy('resources/assets/js/theme/jquery.min.js', 'public/js')
    .copy('resources/assets/js/theme/tether.min.js', 'public/js')
    .copy('resources/assets/js/theme/bootstrap.min.js', 'public/js')
    .copy('resources/assets/js/theme/waves.js', 'public/js')
    .copy('resources/assets/js/theme/jquery.nicescroll.js', 'public/js')
    .copy('resources/assets/plugins/switchery/switchery.min.js', 'public/js/plugins')
    .copy('resources/assets/js/theme/jquery.core.js', 'public/js')
    .copy('resources/assets/js/theme/jquery.app.js', 'public/js')
    .copy('resources/assets/fonts', 'public/fonts')
    .copy('resources/assets/plugins/select2','public/plugins/select2', false)
    .copy('resources/assets/plugins/autoNumeric','public/plugins/autoNumeric', false)
    .copy('resources/assets/plugins/bootstrap-datepicker','public/plugins/bootstrap-datepicker', false)
    .copy('resources/assets/plugins/bootstrap-sweetalert','public/plugins/bootstrap-sweetalert', false)
    .copy('resources/assets/plugins/datatables','public/plugins/datatables', false)
    .copy('resources/assets/plugins/autocomplete','public/plugins/autocomplete', false);