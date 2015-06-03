//initialize all of our variables
var app, base, concat, directory, gulp, gutil, hostname, path, refresh, sass, uglify, imagemin, minifyCSS, del, browserSync, autoprefixer, gulpSequence, shell, sourceMaps;

var autoPrefixBrowserList = ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'];

//load all of our dependencies
//add more here if you want to include more libraries
gulp        = require('gulp');
gutil       = require('gulp-util');
concat      = require('gulp-concat');
uglify      = require('gulp-uglify');
sass        = require('gulp-sass');
sourceMaps  = require('gulp-sourcemaps');
imagemin    = require('gulp-imagemin');
minifyCSS   = require('gulp-minify-css');
browserSync = require('browser-sync');
autoprefixer = require('gulp-autoprefixer');
gulpSequence = require('gulp-sequence').use(gulp);
shell       = require('gulp-shell');

//compiling our SCSS files
gulp.task('styles', function() {
	//the initializer / master SCSS file, which will just be a file that imports everything
	return gulp.src('assets/styles/init.scss')
				//get sourceMaps ready
				.pipe(sourceMaps.init())
				//include SCSS and list every "include" folder
			   .pipe(sass({
					  errLogToConsole: true,
					  includePaths: [
						  'assets/styles/'
					  ]
			   }))
			   .pipe(autoprefixer({
				   browsers: autoPrefixBrowserList,
				   cascade:  true
			   }))
			   //catch errors
			   .on('error', gutil.log)
			   //the final filename of our combined css file
			   .pipe(concat('style.css'))
				//get our sources via sourceMaps
				.pipe(sourceMaps.write())
			   //where to save our final, compressed css file
			   .pipe(gulp.dest('assets/styles/'))
			   //notify browserSync to refresh
			   .pipe(browserSync.reload({stream: true}));
});

//compiling our SCSS files for deployment
gulp.task('styles-deploy', function() {
    //the initializer / master SCSS file, which will just be a file that imports everything
	return gulp.src('assets/styles/init.scss')
                //include SCSS includes folder
               .pipe(sass({
                      includePaths: [
						  'assets/styles/'
                      ]
               }))
               .pipe(autoprefixer({
                   browsers: autoPrefixBrowserList,
                   cascade:  true
               }))
               //the final filename of our combined css file
               .pipe(concat('assets/styles/style.css'))
               .pipe(minifyCSS())
               //where to save our final, compressed css file
               .pipe(gulp.dest(''));
});

//compiling our Javascripts
gulp.task('scripts', function() {
    //this is where our dev JS scripts are
    return gulp.src(['assets/scripts/src/_includes/**/*.js', 'assets/scripts/src/**/*.js'])
                //this is the filename of the compressed version of our JS
               .pipe(concat('app.js'))
               //catch errors
               .on('error', gutil.log)
               //where we will store our finalized, compressed script
               .pipe(gulp.dest('assets/scripts'))
               //notify browserSync to refresh
               .pipe(browserSync.reload({stream: true}));
});

//compiling our Javascripts for deployment
gulp.task('scripts-deploy', function() {
    //this is where our dev JS scripts are
    return gulp.src(['assets/scripts/src/_includes/**/*.js', 'assets/scripts/src/**/*.js'])
                //this is the filename of the compressed version of our JS
               .pipe(concat('app.js'))
               //compress :D
               .pipe(uglify())
               //where we will store our finalized, compressed script
               .pipe(gulp.dest('assets/scripts'));
});

gulp.task('default', ['styles', 'scripts']);

gulp.task('deploy', ['styles-deploy', 'scripts-deploy']);