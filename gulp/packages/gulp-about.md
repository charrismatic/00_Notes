gulp-about 
https://github.com/michaelbazos/gulp-about

Gulp plugin useful for generating information about your application build, such as name, version ...

npm install --save-dev gulp-about


Usage
gulpfile.js


var about = require('gulp-about');
var gulp = require('gulp');
 
gulp.task('about', function () {
    return gulp.src('package.json')
        .pipe(about())
        .pipe(gulp.dest('dist'));  // writes dist/about.json 
});
The above task will produce the file about.json in the folder dist. By default, only the name and the version of the application are written.

Options
Pass options to gulp-about:


gulp.task('about', function () {
    return gulp.src('package.json')
        .pipe(about({
            keys: ['name', 'version', 'author'],   // properties to pick from the source 
            inject: {                              // custom properties to inject 
                buildDate: Date.now()
            }
        }))
        .pipe(gulp.dest('dist'));
});
keys
Type: String | String[] Default: ['name', 'version']

The properties to keep from the source file.

fileName
Type: String Default: about.json

The name of the destination file.

indent
Type: Number Default: 2

The number of spaces used for indentation in the destination file.

inject
Type: Object Default: {}

Object of properties to inject in the output. Useful to extend the output with properties not in the source file.


