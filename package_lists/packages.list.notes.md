THEMING AND CUSTOMIZATION
1. UNITY TWEAK TOOL (ALTHOUGH WITH UNITY ANNOUNCED DEAD IN THE WATER RECENTLY, NOT SURE IF WE WILL STILL USE THIS TOOL)
2. COMPIZ CONFIG SETTINGS MANAGER "compizconfig-settings-manager"
3. THEMES GO INTO /USR/SHARE/THEMES


NETWORK MONITORING PACKAGES
1. Bandwidth performance - nload bmon slurm bwm-ng cbm speedometer netload(netdiag)
nload
bmon
bwm-ng
speedometer
netdiag

2. Overall bandwidth (batch style output) - vnstat ifstat dstat collectl

2. Bandwidth per socket connection - iftop iptraf tcptrack pktstat netwatch(netdiag) trafshow(netdiag)

3. Bandwidth per process - nethogs

iftop - display bandwidth usage on an interface by host
iptraf
vnstat
nethogs
pvnstat
ifstat
collectl
cbm
tcptrack
pktstat
slurm
dstat

sudo apt-get install dstat nload iftop iptraf vnstat nethogs bmon bwm-ng pvnstat ifstat collectl cbm tcptrack pktstat speedometer slurm netdiag;




##DATABASE
# SQLite Browser
# https://github.com/sqlitebrowser/sqlitebrowser
sudo add-apt-repository -y ppa:linuxgndu/sqlitebrowser
sudo apt-get update
sudo apt-get install sqlitebrowser


#NOTE TAKING
noblenote - Qt program for taking notes
nodau - simple console based note taking program
note - small program managing notes from commandline http://www.daemon.de/NoteUsage
notebook-gtk2 - A GTK+ logbook editor
notes-app - Notes application
notes-app-autopilot - Test package for the notes app


#TODO LIST
devtodo - hierarchical, prioritised todo list manager
etm - Manages events and tasks using simple text files
gnome-todo - minimalistic personal task manager designed to fit GNOME desktop
hnb - hierarchical notebook
jpilot - graphical app. to modify the contents of your Palm Pilot's DBs
keepnote - cross-platform note-taking and organization application
org-mode - keep notes, maintain ToDo lists, and do project planning in emacs
task - feature-rich console based todo list manager - transitional package
taskcoach - friendly task manager
taskwarrior - feature-rich console based todo list manager
tasque - simple task management application
todotxt-cli - simple and extensible shell script for managing todo.txt file
tudu - Command line hierarchical ToDo list
ukolovnik - Simple todo manager using PHP and MySQL
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
