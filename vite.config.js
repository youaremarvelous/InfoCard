import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
  plugins: [
    vue(),
  ],
  
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
    extensions: ['.mjs', '.js', '.ts', '.jsx', '.tsx', '.json', '.vue'],
  },
  
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    cssCodeSplit: false, // Wichtig: CSS in eine Datei
    lib: {
      entry: path.resolve(__dirname, 'resources/js/card.js'),
      name: 'InfoCard',
      formats: ['umd'],
      fileName: () => 'js/card.js',
    },
    rollupOptions: {
      external: ['vue'],
      output: {
        globals: {
          vue: 'Vue',
        },
        assetFileNames: (assetInfo) => {
          // CSS immer als card.css speichern
          if (assetInfo.name.endsWith('.css')) {
            return 'css/card.css';
          }
          return assetInfo.name;
        },
      },
    },
  },
});