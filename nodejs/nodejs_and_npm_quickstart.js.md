<h2>Package Setup</h2>

<h3>Intalling NodesJS &amp; NPM</h3>
** INSTALLING THE NODES PACKAGE MANAGER
REF: http://tecadmin.net/install-latest-nodejs-npm-on-ubuntu/

<h4>1. ADD PPA</h4>
sudo apt-get install python-software-properties
curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -

<h4>2. DOWNLOAD (NODES MAY BE INCLUDED IN SOME REPOS NOW)</h4>
sudo apt-get install nodejs

<h4>3. CHECK VERSION</h4>
node -v
npm -v

<h3>TO UPDATE NPM</h3>
npm install -g npm

<h3>GET THE LATEST VERSION OF GULP</h3>
https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md
<strong>====LOCAL=====</strong>
npm install --save-dev gulpjs/gulp.git#4.0

<strong>====SYSTEM WIDE=====</strong>
sudo add-apt-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs -y # newer nodejs package includes npm


<h3>TO INITIALIZE A NEW PROJECT</h3>
npm init

<h3>TO DOWNLOAD A PACKAGE AND ADD IT TO YOUR DEPENDENCIES</h3>
npm install --save-dev &lt;PROGRAM&gt;


<h2>Gulp</h2>
<h3>Setup</h3>
<h4>Uninstall</h4>
If you've previously installed gulp globally, <em>run npm rm --global gulp</em> before following these instructions.

<h4>Install gulp command line tool</h4>
sudo npm install --global gulp-cli

<h4>Install gulp in your devDependencies (sources)</h4>
Run command in your project directory
npm install --save-dev gulp

<em>** IF PROBLEM TRY RUNNING</em>
npm install

<h4>Create a gulpfile</h4>
Create a file called gulpfile.js in your project root with these contents:

var gulp = require('gulp');

gulp.task('default', function() {
  // place code for your default task here
});

<h4>Run Gulp</h4>
Run the gulp command in your project directory:

gulp

To run multiple tasks, you can use gulp &lt;task&gt; &lt;othertask&gt;.
https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md
