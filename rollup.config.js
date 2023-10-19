import { terser } from "rollup-plugin-terser";

export default {
  input: 'assets/src/js/index.js',
  output: {
    file: 'assets/dist/js/main.min.js',
    format: 'iife', // immediately-invoked function expression — suitable for <script> tags
    sourcemap: true
  },
  plugins: [terser()] // Minify the output JS
};