module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*!\n' +
          ' * <%= pkg.name%> v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
          ' * Copyright 2014-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
          ' */\n',
    jqueryCheck: 'if (typeof jQuery === \'undefined\') { throw new Error(\'Bootstrap requires jQuery\') }\n\n',
    copy: {
      app: {
        expand: true,
        cwd: 'src/',
        src: ['app/**'],
        dest: 'dist/'
      },
      favicon: {
        expand: true,
        cwd: 'src/img/',
        src: 'favicon.ico',
        dest: 'dist/'
      },
      fonts: {
        expand: true,
        cwd: 'src/fonts/',
        src: ['**'],
        dest: 'dist/fonts/'
      },
      html: {
        expand: true,
        cwd: 'src/html/',
        src: ['**'],
        dest: 'dist/'
      }
    },
    autoprefixer: {
        options: {
            browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
        },
        dist: {
          expand: true,
          flatten: true,
          src: 'wordpress/wp-content/themes/arcpolitics/css/init.css',
          dest: 'wordpress/wp-content/themes/arcpolitics/css/'
        }
    },
    clean: {
      dist: 'dist/**/*'
    },
    concat: {
      options: {
        banner: '<%= banner %>\n',
        stripBanners: false
      },
      css: {
        src: ['dist/css/init.css', 'src/css/**/*.css'],
        dest: 'dist/css/init.css'
      },
      js: {
        options: {
          banner: '<%= banner %>\n<%= jqueryCheck %>\n'
        },
        src: ['src/js/**/*.js'],
        dest: 'dist/js/init.js'
      }
    },
    csscomb: {
      dist: {
        files: 'src/**/*.{css,less}'
      }
    },
    csslint: {
      src: [
        '<%= cssmin.dist.dest %>'
      ]
    },
    cssmin: {
      dist: {
        options: {
          noAdvanced: true, // turn advanced optimizations off until the issue is fixed in clean-css
          selectorsMergeMode: 'ie8',
          keepSpecialComments: 0
        },
        src: 'wordpress/wp-content/themes/arcpolitics/css/init.css',
        dest: 'wordpress/wp-content/themes/arcpolitics/style.css'
      }
    },
    less: {
      dist: {
        options: {
          cleancss: true,
        },
        files: {
          "wordpress/wp-content/themes/arcpolitics/css/init.css": "wordpress/wp-content/themes/arcpolitics/css/init.less"
        }
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'dist/js/init.min.js': ['<%= concat.js.dest %>']
        }
      }
    },
    watch: {
      css: {
        files: ['src/css/**/*', 'src/less/**/*'],
        tasks: ['css']
      },
      html: {
        files: ['src/html/**/*'],
        tasks: ['copy:html']
      },
      js: {
        files: ['src/js/**/*'],
        tasks: ['js']
      },
      statix: {
        files: ['src/img/**/*', 'assets/**/*', 'src/fonts/**/*', 'src/app/**/*'],
        tasks: ['static']
      }
    }
  });

  grunt.registerTask('js', [/* 'jshint', */ 'concat:js', 'uglify']);
  grunt.registerTask('css', ['less', /* 'concat:css', */ 'autoprefixer', /* 'csscomb', */ 'cssmin']);
  grunt.registerTask('static', ['copy', /* 'imagemin' */]);
  grunt.registerTask('default', ['css']); //['js', 'css', 'static']);
};
