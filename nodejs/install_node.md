
# Node.js Setup


## INSTALL FROM FILE

Download most recent package

https://nodejs.org/en/ 


## INSTALL FROM PACKAGE MANAGER

https://nodejs.org/en/download/package-manager/


### Debian and Ubuntu based Linux distributions

Including: Linux Mint, Linux Mint Debian Edition (LMDE), elementaryOS, bash on Windows and others.

Node.js is available from the NodeSource Debian and Ubuntu binary distributions repository (formerly Chris Lea's Launchpad PPA). 

Support for this repository, along with its scripts, can be found on GitHub at nodesource/distributions.

https://github.com/chrislea


NOTE: If you are using Ubuntu Precise or Debian Wheezy, read about running Node.js >= 6.x on older distros.
https://github.com/nodesource/distributions/blob/master/OLDER_DISTROS.md


```
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
```


Alternatively, for Node.js 8:

```
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs
```


Optional: install build tools

To compile and install native addons from npm you may also need to install build tools:

```
sudo apt-get install -y build-essential
```


## macOS

Simply download the Macintosh Installer direct from the nodejs.org web site.

If you want to download the package with bash:

```
curl "https://nodejs.org/dist/latest/node-${VERSION:-$(wget -qO- https://nodejs.org/dist/latest/ | sed -nE 's|.*>node-(.*)\.pkg</a>.*|\1|p')}.pkg" > "$HOME/Downloads/node-latest.pkg" && sudo installer -store -pkg "$HOME/Downloads/node-latest.pkg" -target "/"
```

Using Homebrew:

```
brew install node
```


## Windows

Simply download the Windows Installer directly from the nodejs.org web site.



--- 

## Node.js LTS Schedule
https://github.com/nodejs/LTS#lts-schedule1


