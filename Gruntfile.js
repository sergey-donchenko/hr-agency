module.exports = function(grunt) {

	grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
 		
 		/**
		 * Project banner
		 */
		tag: {
		  banner: '/*!\n' +
		          ' * <%= pkg.name %>\n' +
		          ' * <%= pkg.title %>\n' +
		          ' * <%= pkg.url %>\n' +
		          ' * @author <%= pkg.author %>\n' +
		          ' * @version <%= pkg.version %>\n' +
		          ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
		          ' */\n'
		},

 		sass: {
			dev: {
				options: {
                    style: 'expanded',
                    banner: '<%= tag.banner %>',
                    compass: true
                },
                files: {
                    './public/css/styles.css': './app/assets/stylesheets/styles.scss',
                }
			}, 

        	dist: {
                options: {
                    style: 'compressed',
                    compass: true
                },
                files: {
                    './public/css/styles.min.css': './app/assets/stylesheets/styles.scss',
                }
            }
        },

        cssmin: {
			target: {
				options: {
				    sourceMap: true				    
				},
			    files: [{
			        expand: true,
			        cwd: './public/css',
			        src: ['*.css', '!*.min.css'],
			        dest: './public/css',
			        ext: '.min.css'
			    }]
			}
		},

 		watch: {
 			sass : {
        		files: ['./app/assets/stylesheets/*.scss'],  //watched files
		        tasks: ['sass:dev', 'cssmin'],                          //tasks to run
		        options: {
		            livereload: true                        //reloads the browser
		        }
        	},
 		}
 	});
 	
 	// Plugin loading 	
 	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

 	// Task definition
 	grunt.registerTask('default', ['watch']);
    // grunt.registerTask('build', ['copy', 'sass:dist', 'concat:dist', 'uglify:dist', 'cssmin', 'clean', 'phpunit']);
}