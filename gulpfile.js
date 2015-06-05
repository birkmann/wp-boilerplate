//initialize all of our variables
var app, base, concat, directory, gulp, gutil, hostname, path, refresh, sass, uglify, imagemin, minifyCSS, del, browserSync, autoprefixer, gulpSequence, shell, sourceMaps;

var autoPrefixBrowserList = ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'];

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

gulp.task('styles', function() {
	return gulp.src('assets/styles/scss/init.scss')
		.pipe(sourceMaps.init())
			.pipe(sass({
				errLogToConsole: true,
					includePaths: [
						'assets/styles/scss/'
					]
				}))
				.pipe(autoprefixer({
					browsers: autoPrefixBrowserList,
					cascade:  true
				}))
				.on('error', gutil.log)
				.pipe(concat('styles.css'))
				.pipe(sourceMaps.write())
				.pipe(gulp.dest('assets/styles'))
				.pipe(browserSync.reload({stream: true}));
});

gulp.task('styles-deploy', function() {
	return gulp.src('assets/styles/scss/init.scss')
		.pipe(sass({
			includePaths: [
				'assets/styles/scss/'
			]
		}))
		.pipe(autoprefixer({
			browsers: autoPrefixBrowserList,
			cascade:  true
		}))
		.pipe(concat('assets/styles/scss/style.css'))
		.pipe(minifyCSS())
		.pipe(gulp.dest(''));
});

gulp.task('scripts', function() {
	return gulp.src(['assets/scripts/src/_includes/**/*.js', 'assets/scripts/src/**/*.js'])
		.pipe(concat('app.js'))
		.on('error', gutil.log)
		.pipe(gulp.dest('assets/scripts'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('scripts-deploy', function() {
	return gulp.src(['assets/scripts/src/_includes/**/*.js', 'assets/scripts/src/**/*.js'])
		.pipe(concat('app.js'))
		.pipe(uglify())
		.pipe(gulp.dest('assets/scripts'));
});

gulp.task('default', ['styles', 'scripts']);

gulp.task('deploy', ['styles-deploy', 'scripts-deploy']);