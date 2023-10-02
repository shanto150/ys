const mix =require('laravel-mix')
// mix.browserSync('127.0.0.1:8001');

mix.browserSync({
    proxy: '127.0.0.1:8001',
    host: 'localhost',
    open: 'external'
});
