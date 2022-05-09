let mix = require('laravel-mix')

mix.autoload(
    {
        jquery: ['$', 'window.jQuery', 'jQuery']
    }
);

mix.js('resources/js/field.js', 'dist/js')
   .sass('resources/sass/field.scss', 'dist/css')
    .webpackConfig(
        {
            resolve: {
                symlinks: false
            }
        }
    )