import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path' // Import path module for resolving paths

export default defineConfig({
  resolve: {
    alias: {
      // Resolve Ziggy-js path
      ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
      // Resolve Vue to the ESM build
      vue: 'vue/dist/vue.esm-bundler.js',
    },
  },
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
})
