const jquery = require('jquery');
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
        .sass('resources/sass/app.scss', 'public/css')
        .autoload({
                jquery: ['$', 'window.jQuery']
        }); 
        // .postCss('resources/css/app.css', 'public/css', [
        //         // require('postcss-import'),
        //         require('tailwindcss'),
        // ]);
