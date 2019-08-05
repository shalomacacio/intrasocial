const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.css'],
        alias: {
            '@':__dirname+ '/resources'
        }
    }
 });



mix.browserSync('localhost');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
        'public/css/vendor/animate.css',
        'public/css/vendor/jquery.mCustomScrollbar.min.css',
        'public/css/vendor/slick-theme.css',
        'public/css/vendor/slick',
        'public/css/vendor/style_blue.css'
], 'public/css/social.css');

mix.js([
  'public/js/vendor/jquery.min.js',
  'public/js/vendor/script.js',
  'public/js/vendor/scrollbar.js',
  'public/js/vendor/slick.min.js',
], 'public/js/social.js');
