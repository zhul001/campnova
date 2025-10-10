import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// HAPUS baris ini: import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        // HAPUS baris ini: tailwindcss(),
    ],
});