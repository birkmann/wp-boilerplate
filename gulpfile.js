//compiling our SCSS files
gulp.task('styles', function() {
	//the initializer / master SCSS file, which will just be a file that imports everything
	return gulp.src('app/styles/scss/init.scss')
				//get sourceMaps ready
				.pipe(sourceMaps.init())
				//include SCSS and list every "include" folder
			   .pipe(sass({
					  errLogToConsole: true,
					  includePaths: [
						  'app/styles/scss/'
					  ]
			   }))
			   .pipe(autoprefixer({
				   browsers: autoPrefixBrowserList,
				   cascade:  true
			   }))
			   //catch errors
			   .on('error', gutil.log)
			   //the final filename of our combined css file
			   .pipe(concat('styles.css'))
				//get our sources via sourceMaps
				.pipe(sourceMaps.write())
			   //where to save our final, compressed css file
			   .pipe(gulp.dest('/'))
			   //notify browserSync to refresh
			   .pipe(browserSync.reload({stream: true}));
});

gulp.task('default', ['styles']);