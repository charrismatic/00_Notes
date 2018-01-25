** INSTALLING THE NODES PACKAGE MANAGER
REF: http://tecadmin.net/install-latest-nodejs-npm-on-ubuntu/

1. ADD PPA
sudo apt-get install python-software-properties
curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -

2. DOWNLOAD (NODES MAY BE INCLUDED IN SOME REPOS NOW)
sudo apt-get install nodejs

3. CHECK VERSION
node -v
npm -v


TO UPDATE NPM
npm install -g npm


** GET THE LATEST VERSION OF GULP
https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md
====LOCAL=====
npm install --save-dev gulpjs/gulp.git#4.0


====SYSTEM WIDE=====
sudo add-apt-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs -y # newer nodejs package includes npm


** TO INITIALIZE A NEW PROJECT
npm init

** TO USE GULP FROM COMMAND LINE
(sudo) npm install --global gulp-cli

** TO DOWNLOAD A PACKAGE AND ADD IT TO YOUR DEPENDENCIES
npm install --save-dev <PROGRAM>




