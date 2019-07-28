```js
var gulp 		 = require('gulp');
var concat 		 = require('gulp-concat');
var sass 		 = require('gulp-sass');
var minifyCSS 	 = require('gulp-clean-css');
var sourcemaps	 = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var uglify 		 = require('gulp-uglify');
var imagemin	 = require('gulp-imagemin');
var rename 		 = require('gulp-rename');
var del 		 = require('del');
```

```
var sources = {
	js		: 'sources/js/*.js',
	images	: 'sources/images/*',
	css		: ['sources/css/*.css','build/scss/*.css'],
	sass	:	'sources/scss/*.scss'
};


var deploy = {
	js			: 'build/js/*.js',
	css			: 'build/css/*.css'
};
```

SOURCES -> BUILD -> DEPLOY 

RUN SASS DEV
- SCSS FILES GET COMPILED INTO CSS IN THE BUILD FOLDER
- AT DEPLOY TIME THEY ARE COMBINED WITH OTHERS INTO THE MASTER.MIN.CSS
- THEN THE BUILD FOLDER IS REMOVED
- CHECK SOURCES FOLDER FOR ORIGINAL

```
gulp.task('sass-dev', function (){
	return gulp.src( sources.sass )
		.pipe(sass({outputStyle: 'expanded'}) //nested, expanded, compact, compressed
		.on('error', sass.logError))
		.pipe(gulp.dest('build/scss'));
	gulp.start('css-dev');
});
```
```
gulp.task('sass', function (){
	return gulp.src( sources.sass )
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'})
		.on('error', sass.logError))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('build/css'));
});
```

### CSS
- IN DEVELOPMENT CSS FILES WILL BE PROCESSED AND SENT TO
- THE BUILD FOLDER, THEN THE MASETR DEPLOY FUNCTION WILL
- TAKE EVERYTHING FROM BUILD AND MOVE IT INTO THE MASTER

```
gulp.task('css-dev', function(){
    gulp.src( sources.css )
      .pipe( autoprefixer() )
    	  .pipe(concat('master.css'))
      .pipe(gulp.dest('build/css'))
});

gulp.task('css', function(){
    gulp.src( deploy.css )
  		.pipe(sourcemaps.init() )
      .pipe(autoprefixer())
    	  .pipe(concat('master.css'))
      .pipe(minifyCSS())
      .pipe(rename('master.min.css'))
  		.pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('deploy/css'))
});
```

// Minify and copy all JavaScript with sourcemaps
gulp.task('js-dev', function() {
	return gulp.src( sources.js )
	.pipe(sourcemaps.init())
	.pipe(concat('master.js'))
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('build/js'));
});

gulp.task('js', function() {
	return gulp.src( deploy.js )
	.pipe(sourcemaps.init())
	.pipe(concat('master.js'))
	.pipe(uglify())
	.pipe(concat('master.min.js'))
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('deploy/js'));
});


// Copy all static images
gulp.task('images', function() {
  return gulp.src( sources.images)
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('deploy/images'));
});


/* DEV WATCH FUNCTIONS */
gulp.task('watch-sass', function () {
  gulp.watch( sources.sass, ['sass-dev']);
});

gulp.task('watch-js', function () {
	gulp.watch( sources.js, ['js-dev']);
});

gulp.task('watch-css', function () {
	gulp.watch( sources.css, ['css-dev']);
});



// GLOBAL WATCH
gulp.task('watch', function() {
  gulp.watch( sources.js, ['js-dev']);
  gulp.watch( sources.sass, ['sass-dev']);
  gulp.watch( sources.css, ['css-dev']);
});


// REMOVE STUFF
gulp.task('clean', function() {
  // You can use multiple globbing patterns as you would with `gulp.src`
  return del(['build']);
});



// WE RUN DEV VERSION OF CSS AND JS FUNCTION TO MAKE SURE THAT
// ALL FILES GO FROM SOURCES FOLDER THROUGH BUILD AND THEN TO PRODUCTION
gulp.task('deploy', function(){
	gulp.start( 'sass' );
	gulp.start( 'css-dev');
	gulp.start( 'css' );
	gulp.start( 'js-dev' );
	gulp.start( 'js' );
	gulp.start( 'images');
//	gulp.start( 'clean' );
});



// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'js-dev', 'css-dev', 'sass-dev']);
