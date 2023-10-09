module.exports = function (grunt) {
  'use strict'

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-standard');
  grunt.loadNpmTasks('grunt-browserify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-image');
  grunt.loadNpmTasks('grunt-browser-sync');

  const sass = require('sass')

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        implementation: sass,
        outputStyle: 'compressed',
        sourceMap: true,
        includePaths: [
          require('node-normalize-scss').includePaths
        ]
      },
      production: {
        files: [
          {
            'assets/dist/style.css': 'assets/src/sass/main.scss',
            'assets/dist/editor-style.css': 'assets/src/sass/editor.scss'
          }
        ]
      }
    },

    browserify: {
      default: {
        src: 'assets/src/js/index.js',
        dest: 'assets/dist/js/main.min.js',
        options: {
            browserifyOptions: { debug: true },
            transform: [["babelify", { "presets": ["@babel/preset-env"] }]],
        }
      },
      blockeditor: {
        src: 'assets/src/js/block-editor.js',
        dest: 'assets/dist/js/block-editor.min.js',
        options: {
            browserifyOptions: { debug: true },
            transform: [["babelify", { "presets": ["@babel/preset-env"] }]],
        }
      },
    },

    browserSync: {
      dev: {
        bsFiles: {
            src : 'assets/dist/style.css'
        },
        options: {
            proxy: "bitcoin.local",
            watchTask: true
        }
      }
    },

    copy: {
      production: {
        files: [
          {
            expand: true,
            cwd: 'assets/src/fonts',
            src: ['**/*.{eot,svg,ttf,woff,woff2}'],
            dest: 'assets/dist/fonts'
          },
          {
            'static/lib/jquery.min.js': 'node_modules/jquery/dist/jquery.min.js'
          }
        ]
      }
    },

    image: {
      options: {
        svgo: ['--disable', 'removeViewBox', '--disable', 'removeUnknownsAndDefaults']
      },
      dynamic: {
        files: [{
          expand: true,
          cwd: 'assets/src/img',
          src: ['**/*.{png,jpg,gif,svg}'],
          dest: 'assets/dist/img'
        }]
      }
    },

    watch: {
      less: {
        files: ['assets/src/sass/*.scss', 'assets/src/sass/*/*.scss', 'assets/src/sass/**/*.scss'],
        tasks: ['sass']
      },
      js: {
        files: ['assets/src/js/*.js', 'assets/src/js/*/*.js'],
        tasks: 'browserify'
      }
    },
  })

  grunt.registerTask('dev', ['browserSync', 'watch']);

  grunt.registerTask('default', [
    'image',
    'sass',
    'copy',
    'browserify'
  ])
}
