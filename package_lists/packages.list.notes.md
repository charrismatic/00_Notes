THEMING AND CUSTOMIZATION
1. UNITY TWEAK TOOL (ALTHOUGH WITH UNITY ANNOUNCED DEAD IN THE WATER RECENTLY, NOT SURE IF WE WILL STILL USE THIS TOOL)
2. COMPIZ CONFIG SETTINGS MANAGER "compizconfig-settings-manager"
3. THEMES GO INTO /USR/SHARE/THEMES

## NETWORK TOOLS 
  - whois 

NETWORK MONITORING PACKAGES

  - iptraf - interactive ip montioring software (`iptraf-ng`) 
  
  - slurm - Realtime network interface monitor
  
1. __Bandwidth performance__ - nload bmon slurm bwm-ng cbm speedometer netload(netdiag)
  - nload

  - bmon
  
   portable bandwidth monitor and rate estimator
   bmon is a commandline bandwidth monitor which supports various output
   methods including an interactive curses interface, lightweight HTML output but
   also simple ASCII output.

   Statistics may be distributed over a network using multicast or unicast and
   collected at some point to generate a summary of statistics for a set of
   nodes.

  
  - bwm-ng - small and simple console-based bandwidth monitor

    Bandwidth Monitor NG is a small and simple console-based live bandwidth
    monitor.
  
      * supports /proc/net/dev, netstat, getifaddr, sysctl, kstat and libstatgrab
      * unlimited number of interfaces supported
      * interfaces are added or removed dynamically from list
      * white-/blacklist of interfaces
      * output of KB/s, Kb/s, packets, errors, average, max and total sum
      * output in curses, plain console, CSV or HTML
      * configfile

  - netdiag

    Netdiag contains a collection of small tools to analyze network traffic and
    configuration of remote hosts. It is of invaluable help if your
    system is showing strange network behaviour and you want to find out what
    your network is doing. The included tools are `tcpblast`, `netload`, `trafshow`,
    `netwatch`, `statnet`, and `tcpspray`.
   
     
2. __Overall bandwidth__ (batch style output) 
  - vnstat 
  - ifstat 
  - dstat 
  - collectl

3. __Bandwidth per process__ 
  - iftop - display bandwidth usage on an interface by host
  - dstat
  - iftop
  - iptraf
  - netdiag
  - nethogs

  - nload
  
  - speedometer

  - tcptrack

    TCP connection tracker, with states and speeds
    tcptrack is a sniffer which displays information about TCP connections
    it sees on a network interface. It passively watches for connections
    on the network interface, keeps track of their state and displays a
    list of connections in a manner similar to the unix 'top' command. It
    displays  source and destination addresses and ports, connection
    state, idle time, and bandwidth usage.

 
  - vnstat - console-based network traffic monitor
 
   vnStat is a network traffic monitor for Linux. It keeps a log of
   daily network traffic for the selected interface(s). vnStat is not
   a packet sniffer. The traffic information is analyzed from the /proc
   filesystem, so vnStat can be used without root permissions.


  - pktstat - top-like utility for network connections usage

   pktstat displays a real-time list of active connections seen on a
   network interface, and how much bandwidth is being used by what.
   It partially decodes HTTP and FTP protocols to show what filename is
   being transferred, as well as X11 application names. Entries hang
   around on the screen for a few seconds so you can see what just happened.


## DATABASE

[SQLite Browser](https://github.com/sqlitebrowser/sqlitebrowser)

```
  sudo add-apt-repository -y ppa:linuxgndu/sqlitebrowser
  sudo apt-get update
  sudo apt-get install sqlitebrowser
```


## NOTE TAKING
  
  
  __typora__ - A minimal markdown editor  https://typora.io/linux

```
    # optional, but recommended
    sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys BA300B7755AFCFAE
    # add Typora's repository
    sudo add-apt-repository 'deb https://typora.io/linux ./'
    sudo apt-get update
    # install typora
    sudo apt-get install typora
```

  __Boostnote__ - Note-taking for developers  https://boostnote.io/

  __Laverna__ - Private markdown ntoebook https://laverna.cc/

  nodau - simple console based note taking program
  note - small program managing notes from commandline http://www.daemon.de/NoteUsage
  notes-app - Notes application
  keepnote - cross-platform note-taking and organization application

   tpp/bionic,bionic

  tea/bionic 44.1.1-2 amd64
    graphical text editor with syntax highlighting

  swatch/bionic,bionic 3.2.4-1 all
    Log file viewer with regexp matching, highlighting & hooks

  t3highlight/bionic 0.4.5-1 amd64
    Command-line syntax highligher
  spacefm/bionic 1.0.5-2 amd64
    Multi-panel tabbed file manager - GTK2 version

  spacefm-gtk3/bionic 1.0.5-2 amd64
    Multi-panel tabbed file manager - GTK3 version

  highlight/bionic 3.41-1 amd64
    Universal source code to formatted text converter

  highlight-common/bionic,bionic 3.41-1 all
    source code to formatted text converter (architecture independent files)

  highlight.js-doc/bionic,bionic 9.12.0+dfsg1-4 all
    JavaScript library for syntax highlighting - documentation

  icdiff/bionic,bionic 1.9.1-2 all
    terminal side-by-side colorized word diff

  gromit/bionic 20041213-9build1 amd64
    GTK based tool to make annotations on screen

  gromit-mpx/bionic 1.2-2 amd64
    GTK+ based tool to make annotations on screen with multiple pointers

  gitg/bionic 3.26.0-4 amd64
    git repository viewer
  fte/bionic 0.50.2b6-20110708-2 amd64
    Text editor for programmers - base package

  fte-console/bionic 0.50.2b6-20110708-2 amd64
    Text editor for programmers - console edition, no I18N support

  fte-docs/bionic,bionic 0.50.2b6-20110708-2 all
    Documentation and examples for the FTE editor

  fte-terminal/bionic 0.50.2b6-20110708-2 amd64
    Text editor for programmers - version for terminals

  fte-xwindow/bionic 0.50.2b6-20110708-2 amd64
    Text editor for programmers - X Window System edition with I18N support


  python-pygments/bionic,bionic 2.2.0+dfsg-1 all
    syntax highlighting package written in Python

  python-pygments-doc/bionic,bionic 2.2.0+dfsg-1 all
    documentation for the Pygments

  python3-pygments/bionic,bionic 2.2.0+dfsg-1 all
    syntax highlighting package written in Python 3

  ruby-github-linguist/bionic 5.3.3-1 amd64
    detection and highlight of the programming language of source code

  ruby-pygments.rb/bionic,bionic 1.2.0-2 all
    pygments wrapper for Ruby

  hroma/bionic 0.4.0+git20180402.51d250f-1 amd64
    general purpose syntax highlighter in pure Go


# TODO LIST


  taskwarrior - taskwarrior.org
  taskwarrior - feature-rich console based todo list manager

  etm - Manages events and tasks using simple text files
  gnome-todo - minimalistic personal task manager designed to fit GNOME desktop
  task - feature-rich console based todo list manager - transitional package
  taskcoach - friendly task manager
  todotxt-cli - simple and extensible shell script for managing todo.txt file
  w2do - simple text-based todo manager
  yokadi - commandline todo system
  todo-cli
  Todolist: The perfect command-line task management app. Fast, simple, GTD.
  Todo.txt CLI Manages Your Tasks from the Command Line


# PASSWORDS
pass - lightweight directory-based password manager
passwdqc - password strength checking and policy enforcement toolset
password-gorilla - cross-platform password manager
passwordmaker-cli - creates unique, secure passwords - CLI version
passwordsafe - Simple & Secure Password Management
passwordsafe-common - architecture independent files for Password Safe
Pass: The Standard Unix Password Manager
kpcli  CLI to KeePass Database Fileshttp://software.opensuse.org/package/kpcli
makepasswd - Generate and encrypt passwords
kwalletcli - command line interface to the KDE Wallet
kwalletmanager - secure password wallet manager
lastpass-cli - command line interface to LastPass.com
keepass2 - Password manager
keepass2-doc - Password manager - Documentation
keepassx - Cross Platform Password Manager
keychain - key manager for OpenSSH


#PDF TOOLS
pdfcrack - PDF files password cracker
pdftk - tool for manipulating PDF documents
pdftk-dbg - tool for manipulating PDF documents (debugging symbols)

# TIME TRACKING
charmtimetracker - Cross-Platform Time Tracker
hamster-applet - time tracking applet for GNOME
pal - command-line calendar program that can keep track of events
wmwork - Keep track of time worked on projects


# GIT TOOLS 

#BUG TRACKING
bugs-everywhere - distributed bug tracking system using VCS storage
debbugs - The bug tracking system based on the active Debian BTS
ditrack - lightweight distributed issue tracking system
trac - Enhanced wiki and issue tracking system for software development projects
bugs-everywhere - distributed bug tracking system using VCS storage
bugz - command-line interface to Bugzilla


#ISSUE TRACKING
cil - command line issue tracker
ditrack - lightweight distributed issue tracking system
roundup - an issue-tracking system
trac - Enhanced wiki and issue tracking system for software development projects
trac-tags - Tagging plugin for Trac wiki and issue tracking system

## FILE TYPE SUPPORT
# .msg file type -- use MSGConvert
http://www.matijs.net/software/msgconv/
sudo apt-get install libemail-outlook-message-perl libemail-sender-perl
msgconvert *.msg


#ACCOUNT MANAGEMENT
acct - GNU Accounting utilities for process and login accounting (user connect times and process execution statistics)
  commands: [
  ac - print statistics about connect time
  accton - turns accounting on or off
  last - list last logins of users and terms
  lastcomm - list last commands executed
  sa - print accounting statistics
  dump-acct - print accounting file in human-readable form
  ]

##SYSTEM TOOLS
iotop - simple top-like I/O monitor
htop - interactive process viewer
atop - AT Computing's System & Process Monitor
