module.exports = function(grunt)
{





	// Configuration goes here
	grunt.initConfig(
	{
		pkg: grunt.file.readJSON('package.json'),





		// Stel config vars in
		config:
		{
        	theme_dir: 'httpdocs/wp-content/themes/ylt-theme',
    	},





        sass:
        {
            dist:
            {
                options:
                {                       // Target options
                    outputStyle: 'compressed',
                    trace: true,
                    noCache: true,
                    sourceMap: true,
                },
                files:
                {
                    '<%= config.theme_dir %>/assets/css/style.min.css': '<%= config.theme_dir %>/assets/sass/main.scss',
                    '<%= config.theme_dir %>/assets/css/admin.min.css': '<%= config.theme_dir %>/assets/sass/admin.scss'

                }
            }
        },





        jshint:
        {
            options:
            {
                eqeqeq: true,
                esversion: 5,
                latedef: true,
                shadow: true,
                strict: "global",
                undef: true,
                unused: true,
                browser: true,
                devel: true,
                globals:
                {
                    HOME_URL: true,
                    jQuery: true,
                    myAjax: true,
                    google: true,
                    require: true
                },
            },
            files: ['<%= config.theme_dir %>/assets/js/script.js','<%= config.theme_dir %>/assets/js/includes/*.js']
        },





		// Kijk voor wijzigingen, bij wijziging van bestand voer Grunt actie 'dev' uit
		watch:
		{
			build:
			{
				files: [
                    '<%= config.theme_dir %>/**/*.js',
                    '<%= config.theme_dir %>/**/*.css',
                    '<%= config.theme_dir %>/assets/sass/*.scss',
                    '<%= config.theme_dir %>/assets/sass/**/*.scss',
                    '<%= config.theme_dir %>/**/*.php'
                    ],
				tasks: ['default'],
				options:
				{
					spawn: false,
				},
			},
		},





        phplint:
        {
            testing: ['<%= config.theme_dir %>/**/*.php']
        },





        browserify:
        {
            dist:
            {
                files:
                {
                    '<%= config.theme_dir %>/assets/js/script.min.js':
                    [
                        '<%= config.theme_dir %>/assets/js/vendor/*.js',
                        '<%= config.theme_dir %>/assets/js/includes/*.js',
                        '<%= config.theme_dir %>/assets/js/script.js'
                    ]
                },
                options:
                {
                    browserifyOptions:
                    {
                        debug: true
                    },
                    transform: ['uglifyify'],
                },
            }
        },





        exorcise:
        {
            dist:
            {
                options: {},
                files:
                {
                    '<%= config.theme_dir %>/assets/js/script.min.js.map': ['<%= config.theme_dir %>/assets/js/script.min.js'],
                }
            }
        }





	});





	// Load plugins here
	grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-phplint');
    grunt.loadNpmTasks('grunt-browserify');
    grunt.loadNpmTasks('grunt-exorcise');





	// Define your tasks here
	//grunt.registerTask('default', ['sass', 'jshint', 'browserify', 'exorcise', 'phplint', ]);
	grunt.registerTask('default', ['sass', 'jshint', 'browserify', 'exorcise', ]);





};
