import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vuePlugin from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
    plugins: [
        vuePlugin(),
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'ziggy-js': path.resolve('vendor/tightenco/ziggy'),
            '@': path.resolve('resources/js')
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @use "sass:math";
                    @import "resources/css/__var.scss";
                    @import "resources/css/__app.scss";
                    @import "resources/css/__reset.scss";
                `,
            },
        },
    },
});
