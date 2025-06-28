import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/theme/style.scss",
                // "resources/assets/vendors/core/core.css",
                // "resources/assets/fonts/feather-font/css/iconfont.css",
                // "resources/assets/vendors/flag-icon-css/css/flag-icon.min.css",
                // "resources/assets/css/demo_1/style.css",
                // "resources/assets/images/favicon.png",

                "resources/js/app.js",
                // "resources/assets/vendors/core/core.js",
                // "resources/assets/vendors/progressbar.js/progressbar.min.js",
                // "resources/assets/vendors/feather-icons/feather.min.js",
                // "resources/assets/js/template.js",
                // "resources/assets/js/dashboard.js",
            ],
            refresh: true,
        }),
    ],
});
