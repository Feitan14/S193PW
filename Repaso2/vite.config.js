import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/bootstrap/dist/css/bootstrap.min.css',
                'node_modules/alertifyjs/build/css/alertify.min.css',
                'node_modules/alertifyjs/build/css/themes/default.min.css',
                'node_modules/alertifyjs/build/alertify.min.js',
            ],
            refresh: true,
        }),
    ],
});
