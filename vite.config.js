import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/jquery-3.7.1.min.js',
                'resources/js/bootstrap.min.js',
                'resources/js/app.js',
                'resources/css/bootstrap.min.css',
                'resources/css/all.min.css',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
});
