const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

//mix.setPublicPath('../../../public_html').mergeManifest();
//



//var src=__dirname + '/Resources/assets';
var src='Resources/assets';
//var dest=__dirname + '/Resources/views/dist';
var dest1='Resources/views/dist';
var dest='../../../laravel/resources/views/themes/coderdocs';
//mix.setResourceRoot('../');
mix.setPublicPath(dest1).mergeManifest();
//mix.setPublicPath(dest).mergeManifest();

mix
    .autoload({
        'jquery': ['$', 'window.jQuery', 'jQuery'],
        'moment': ['moment','window.moment'],
    });

mix.js(src+'/js/app.js', dest1+'/js/theme.js')
    .sass( src+'/sass/app.scss', dest1+'/css/theme.css');

if (mix.inProduction()) {
    mix.version();
}

//mix.extract(['vue','jquery']);
