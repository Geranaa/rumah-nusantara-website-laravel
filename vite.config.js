import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import fs from "fs-extra";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/navbar.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
        {
            name: "copy-tinymce",
            apply: "serve",
            configureServer(server) {
                server.middlewares.use((req, res, next) => {
                    if (req.url.startsWith("/js/tinymce")) {
                        const filePath = path.resolve(
                            __dirname,
                            "vendor/tinymce/tinymce",
                            req.url.replace("/js/tinymce", ""),
                        );
                        res.sendFile(filePath);
                    } else {
                        next();
                    }
                });
            },
        },
        {
            name: "copy-tinymce-build",
            apply: "build",
            async writeBundle() {
                const tinymceSource = path.resolve(
                    __dirname,
                    "vendor/tinymce/tinymce",
                );
                const tinymceDestination = path.resolve(
                    __dirname,
                    "public/js/tinymce",
                );
                await fs.copy(tinymceSource, tinymceDestination);

                console.log("TinyMCE copied.");
            },
        },
    ],
});
