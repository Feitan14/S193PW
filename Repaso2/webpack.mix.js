const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css')
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.css')
.copy('node_modules/alertifyjs/build/css/alertify.min.css', 'public/css/alertify.css')
.copy('node_modules/alertifyjs/build/css/themes/default.min.css', 'public/css/alertify_default.css')
.copy('node_modules/alertifyjs/build/alertify.min.js', 'public/js/alertify.js');
