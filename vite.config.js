import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import WindiCSS from 'vite-plugin-windicss';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        WindiCSS(),
    ],
});
