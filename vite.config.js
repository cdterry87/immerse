import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/filament/administrator/theme.css', 'resources/css/filament/manager/theme.css', 'resources/css/filament/member/theme.css', 'resources/css/filament/volunteer/theme.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});