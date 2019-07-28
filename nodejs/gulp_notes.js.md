Getting Started

If you've previously installed gulp globally, run npm rm --global gulp before following these instructions.

Install the gulp command  

npm install --global gulp-cli

Install gulp in your devDependencies

Run this command in your project directory:

npm install --save-dev gulp


** IF PROBLEM TRY RUNNING
npm install

Create a gulpfile

Create a file called gulpfile.js in your project root with these contents:

var gulp = require('gulp');

gulp.task('default', function() {
  // place code for your default task here
});
Test it out

Run the gulp command in your project directory:

gulp
Voila! The default task will run and do nothing.

To run multiple tasks, you can use gulp <task> <othertask>.

https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md
