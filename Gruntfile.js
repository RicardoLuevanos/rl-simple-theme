module.exports = function(grunt) {
  'use strict';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			options: {
				separator: ';',
				stripBanners: true
			},
			dist: {
				src: [
					'assets/js/*.js'
				],
				dest: 'assets/js/rl-simple-theme.js'
			}
		},

		sass: {
			options: {
				sourceMap: true
			},
			dist: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'assets/css/rl-simple-theme.css': 'assets/scss/rl-simple-theme.scss'
				}
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: 'assets/css/',
				src: [
					'rl-simple-theme.css'
				],
				dest: 'assets/css/',
				ext: '.min.css'
			}
		},

		uglify: {
			dist: {
				files: {
					'assets/js/rl-simple-theme.js': [
						'assets/js/rl-simple-theme.js'
					]
				}
			}
		},

		watch: {
			grunt: {
				files: [
					'Gruntfile.js'
				]
			},
			sass: {
				files: 'assets/scss/**/*.scss',
				tasks: [
					'sass',
					'postcss',
					'cssmin'
				],
				options: {
					livereload: true
				}
			},
			js: {
				files: 'assets/js/*.js',
				tasks: [
					'concat',
					'uglify'
				],
				options: {
					livereload: true
				}
			}
		},

		postcss: {
			options: {
				map: true,
				processors: [
					require('autoprefixer')({browsers: 'last 2 versions'})
				]
			},
			dist: {
				src: 'assets/css/rl-simple-theme.css'
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('build', ['sass', 'postcss', 'cssmin', 'concat', 'uglify']);
	grunt.registerTask('default', ['watch']);
};
