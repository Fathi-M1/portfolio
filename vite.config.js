import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

const extensions = [
  '.web.tsx', '.web.ts', '.web.jsx', '.web.js',
  '.tsx', '.ts', '.jsx', '.js', '.json',
];

// https://vite.dev/config/
export default defineConfig({
  plugins: [react()],
  define: {
    global: 'window',
  },
  resolve: {
    alias: {
      'react-native': 'react-native-web',
    },
    extensions: extensions,
  },
  optimizeDeps: {
    rolldownOptions: {
      resolve: {
        extensions: extensions,
      }
    },
  },
})
