import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '10.10.10.237', // Ganti dengan host kustom Anda
        port: 5173, // Anda bisa mengubah port jika diperlukan
    },
});
