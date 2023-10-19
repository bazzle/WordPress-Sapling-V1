import { terser } from "rollup-plugin-terser";

// Define multiple input and output options
const configs = [
  {
    input: 'assets/src/js/index.js',
    output: {
      file: 'assets/dist/js/main.min.js',
      format: 'iife', // immediately-invoked function expression — suitable for <script> tags
      sourcemap: true
    },
    plugins: [terser()] // Minify the output JS
  },
  {
    input: 'assets/src/js/block-editor.js',
    output: {
      file: 'assets/dist/js/block-editor.min.js',
      format: 'iife', // immediately-invoked function expression — suitable for <script> tags
      sourcemap: true
    },
    plugins: [terser()] // Minify the output JS
  }
];

// Export as an array of configurations
export default configs;
