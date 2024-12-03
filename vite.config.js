import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// Add the required plugin for SCSS support
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // Your main app CSS
                'resources/js/app.js',    // Your main app JS
            ],
            refresh: true,
        }),
    ],
});
