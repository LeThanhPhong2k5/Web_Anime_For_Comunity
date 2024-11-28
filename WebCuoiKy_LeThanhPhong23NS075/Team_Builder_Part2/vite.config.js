import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/webmain.css',
                'resources/css/noidunganime.css',
                'resources/css/CSS_LoginAndRegister/styleLogin.css',
                'resources/css/CSS_LoginAndRegister/styleRegister.css',
                'resources/css/ANIME/webmain.css',
                'resources/css/ANIME/noidunganime.css',
                'resources/css/CSS_Admin/styleAdmin.css',
                'resources/css/CSS_Admin/styleLoginForAdmin.css',
                'resources/css/CSS_Admin/simple-custom.css',
            ],
            refresh: true,
        }),
    ],
});
