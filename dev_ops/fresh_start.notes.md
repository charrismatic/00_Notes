# DEVELOPER QUICK START - SETUP GUIDE 

Written using: __UBUNTU 17.04 VERSION__

---

## HIGH PRIORITY PACKAGES 

Get git, then use that to go get all of our backup scripts, bootstrappers, and dotfiles from your backup/cloud backup repository

```
apg-get-install git 
```


In case you haven't done so yet  

- [ ] TODO: SETUP PERSONAL REPOS/DOTFILES/ENV BACKUPS


```
git clone https://github.com/charrismatic/dotfiles

mkdir ~/profiles/bash

cp .bashrc .profile ~/profiles/bash

mkdir ~/bin 

https://git.myserver/chrrismatic/scripts (PRIVATE)

cp ~/dotfiles/env/bash/* ~/

source .bashrc

```

# GNOME PROFILE CONFIG 

I do this early on because I hate looking at ugly interfaces and using clunky workflows when I have already 
personailized, optimized, and commited all the shortcuts and commands to memory. So the faster I have all my commands 
and interfaces/controls/dashboards setup the bestter.

- Setup theme, icons, gnome config 


```
cp <scripts>/env/profile ~/profiles/

sudo cp -r ~/profiles/themes/* /usr/share/themes/ ;
sudo cp -r ~/profiles/icons/* /usr/share/icons/
```

then extract

sudo apt-get install gnome-tweak-tool unity-tweak-tool compiz-con 

---

# INSTALL CHROME


__google-chrome-stable__ https://www.google.com/chrome/browser/desktop/index.html

---

#MUSIC

Lets get some music going while we're at it, this helps focus and we can turn up the tempo a little bit and move a little faster


INSTALL SPOTIFY

https://www.spotify.com/us/download/linux/

    ```
    # 1. Add the Spotify repository signing keys to be able to verify downloaded packages
    sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys BBEBDCB318AD50EC6865090613B00F1FD2C19886 0DF731E45CE24F27EEEB1450EFDC8610341D9410
    
    # 2. Add the Spotify repository
    echo deb http://repository.spotify.com stable non-free | sudo tee /etc/apt/sources.list.d/spotify.list
    
    # 3. Update list of available packages
    sudo apt-get update
    
    # 4. Install Spotify
    sudo apt-get install spotify-client
    
    ```


---

## EDITOR OF CHOICE 

I use several editors, notepads, and IDES over the course of a project. A lot of the time
Im sitting inside a terminal on a remote server doing most of the editing, but when I have a chance
and I need to do more complicated things then I use Atom by Github (and community)

It can be a bit of a resources hog at times, but I've grown with it over time and I know enough about how it works to 
jump and fix a broken pipe or leaky valve if I need to. Plus its free and open source which is a requirement for me. 

If I can't instantly break the flow and see what all internals are doing, then I dont want to use your software. 
It's 2018 and the internet is shady as hell right now, so I want. Recently as much as I can I only using programs that I compiled locally 
and extensions that I built myself, or forked from a trusted source.   

I'm not totally a hardline "I must do everything for myself" type, but after developing for a long enough, I've just collected enough bits and 
pieces  of tools that I pretty much have the bases covered, also its way more fun to use things you made yourself than pulling something shiny off a shelf.



## EDITOR CONFIG SYNCHRONIZATION 

There is a wonderful package for atom that uses a github gits and an token to keep every change you make in the editor backed up and in sync, (works across machines as well)

So before we do anything else, lets revive Atom from its last known state. 



### Atom https://atom.io/


! NOTE: Resync settings 
  Config and package backup files 
  https://gist.github.com/mjharris2407/6f9b76737a29c6170e8f907046469445

  Grab this pacakge 
  https://atom.io/packages/sync-settings

  atom.coffee 
  https://gist.github.com/mjharris2407/87e598bb8e1d91adc6f2ec01dbf97d5f

  Install personal theme 
  https://github.com/mjharris2407/00-dark-minimal-ui
  https://github.com/mjharris2407/00-dark-minimal-syntax

---

GitKraken
https://www.gitkraken.com/download/linux-deb

VirtualBox (Prebuilt) 
http://www.oracle.com/technetwork/server-storage/virtualbox/downloads/index.html
~optional grab Virtualbox Extension Pack


Vagrant
https://www.vagrantup.com/downloads.html 
https://github.com/hashicorp/vagrant

~optional add vagrant boxes vagrant box add <name>/<box>|url

  - scotch/box v3.0 (732 MB)
    Ubuntu 14
    Full LAMP stack  
    PHP 7.0/5.6 + Composer, Laravel
    MySQL / PostgreSQL
    WordPress + WP-CLI
    MongoDB 
    MongoDB PHP
    Opcache is disabled
    Node 5.x + NPM packages (Bower, Gulp, Yeoman, Browser-Sync, PM2)
    Mailcatcher is added to test emails finally
    Beanstalkd
    Redis
    PM2
  
  - debian/jessie64 (302 MB)
  - hashicorp/precise64 ()
  - ubuntu/trusty64 
  - centos/7

~optional vagrant plugins 
  ```vagrant plugin install <plugin-name>```

    Vagrant::Ghost
    https://github.com/10up/vagrant-ghost
    Adds an entry to your /etc/hosts file on the host system 
    ```config.ghost.hosts = ["alias.testing.de", "alias2.somedomain.com"]```
      Additional aliases can be added by creating an /aliases file at the root of the Vagrant machine installation with one host alias per line. This file will be re-imported whenever Vagrant Ghost updates the hostsfile.
    
    You may change the name of the aliases file by setting the hosts_files configuration option in your Vagrantfile:
    
    config.ghost.hosts_files = "hosts_aliases" # Could be anything, e.g. "hosts", or whatever


   	
   	Vagrant::HostManager
   	https://github.com/devopsgroup-io/vagrant-hostmanager

   	vagrant plugin install vagrant-hostmanager
   	
   	Manages the hosts file on guest machines (and optionally the host). Its goal is to enable resolution of multi-machine environments deployed with a cloud provider where IP addresses are not known in advance.
   	update the hosts file on each active machine, run the following command:

    ```vagrant hostmanager``` 
    
    Example configuration:
    ```
    Vagrant.configure("2") do |config|
      config.hostmanager.enabled = true
      config.hostmanager.manage_host = true
      config.hostmanager.manage_guest = true
      config.hostmanager.ignore_private_ip = false
      config.hostmanager.include_offline = true
      config.vm.define 'example-box' do |node|
        node.vm.hostname = 'example-box-hostname'
        node.vm.network :private_network, ip: '192.168.42.42'
        node.hostmanager.aliases = %w(example-box.localdomain example-box-alias)
      end
    end
    ```



---


Node.js

https://nodejs.org/en/

https://nodejs.org/en/docs/guides/

Download the a current build 

see notes on pacakge managers
https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions

``
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
```

OR 
 
```
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs
```

sudo apt-get install -y build-essential

---
NODESOURCE DISTROS
https://github.com/nodesource/distributions

```
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash - 

sudo apt-get install nodejs
```
FIXING NPM PERMISSIONS 

https://docs.npmjs.com/getting-started/fixing-npm-permissions

Find the path to npm's directory:

 npm config get prefix
For many systems, this will be /usr/local.


Option 2: Change npm's default directory to another directory

There are times when you do not want to change ownership of the default directory that npm uses (i.e. /usr) as this could cause some problems, for example if you are sharing the system with other users.

Instead, you can configure npm to use a different directory altogether. In our case, this will be a hidden directory in our home folder.

Make a directory for global installations:

 mkdir ~/.npm-global
Configure npm to use the new directory path:

 npm config set prefix '~/.npm-global'
Open or create a ~/.profile file and add this line:

 export PATH=~/.npm-global/bin:$PATH
Back on the command line, update your system variables:

 source ~/.profile 


--- 



# DESKTOP SETUP

FACEBOOK MESSENGER / CAPRINE

https://desktop.telegram.org/

VLC Media Player, gimp,Shutter, color grab, darktables, dropbox

Stacer 

# applets 
KDE Connect Indicator — interact with your Android smartphone
Simple Weather — get basic forecast information
Indicator Multiload — monitor system resources
Caffeine — stop your screensaver or lock-screen from kicking in
Bulletin — A searchable clipboard manager
Missed Notifications — A log of desktop notifications



---

# WEB DEV STACK


### Composer

https://github.com/composer/composer


```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php --install-dir=~/bin --filename=composer

php -r "unlink('composer-setup.php');"
``` 


```