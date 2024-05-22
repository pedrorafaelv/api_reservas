import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        manifestSRI(),

    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
    build: {
        rollupOptions: {
            output: {
                // expose jQuery as a global variable
                globals: {
                    jquery: 'jQuery'
                },
            },
        },
    },
});