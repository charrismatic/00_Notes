http://www.tuxradar.com/content/command-line-tricks-smart-geeks


Command line tricks for smart geeks
===================================

Posted at 10:37pm on Monday November 16th 2009

![Command line](/files/icons/commandline.png)  

Everyone knows the answer to the question of life, the universe and everything is "42", but for the first time we can reveal the question. It is this: how many command-line tricks must a man memorise? You see, graphical user interfaces are all well and good, but when you want to get _real_ work done it's time to switch to the terminal.

And so, we squeezed our brain cells, dug through dusty piles of old issues of Linux Format, and sat reflecting quietly over many a pint of ale, all with the goal of bringing you this: 42 awesome new command line tricks we think you ought to commit to memory. We've tried to include a few that are easier for our, er, less-experienced readers to enjoy, but we think even the most hardened Linux veteran will learn something new over the next 12,000 words.

So, strap yourself in and get ready for command-line heaven: it's time to kick ass and chew bubble gum, and we're all out of gum...

_(PS: if you're looking for general Linux tips, check out our previous two articles: [Linux tips every geek should know](http://www.tuxradar.com/content/linux-tips-every-geek-should-know) and [More Linux tips every geek should know.](http://www.tuxradar.com/content/more-linux-tips-every-geek-should-know) We also have an article with more [Bash tips for power users](http://tuxradar.com/content/bash-tips-power-users) if you're eager to the neighbourhood Bash wizard, and an excellent [guide to mastering the Linux command line](http://www.tuxradar.com/content/master-linux-command-line).)_

Make your own Bash wormholes
----------------------------

Even for the Bash aficionado, the mkfifo command is likely to be one of the lesser used in your collection. It creates a pipe for sharing data, connecting two running utilities with a kind of command line wormhole. Data sent into one end will instantaneously appear at the other.

Before we look at how to use it, it's worth going over how we typically see pipes. If you've used the shell for anything other than scaring your friends with cat /dev/random, you'll be used to the idea of pipes. They're most often used to stream the output of one program into the input of another. A common use is when there is too much textual output from one command to read. Piping this output into another - usually either less or more - lets you pause and page through the output in your own time:

cat /var/log/messages | less

In this instance, the pipe is temporarily created for the execution of a single command, but using mkfifo it's possible to create persistent pipes that you can use for similar tasks.

The 'fifo' part of the command refers to the nature of the pipe - the data that's first in is first out. Creating the pipe itself is as easy as typing mkfifo, followed by the name you wish to call it. It's also possible to set the permissions for the pipe (using the --mode parameter) so you can restrict access. Once the pipe is created, you just need to route data into it. Here's a brief example. First we create the pipe, and use tail -f to output any data that's sent to it:

mkfifo fifo_pipe
tail -f fifo_pipe

The next step, usually from another console or user account (if the permissions have been set), is to send data to the pipe. Typing echo "This is a test" >> fifo_pipe will send the test message, which will itself be output by the tail command we attached to the pipe.

Remote control MPlayer
----------------------

There are two types of people in this world: those who think MPlayer is the best media player in the history of existence, and those who are wrong. One of MPlayer's lesser-known features is the ability to control it from a console, a shell script or even over the network. The secret to this trick is in MPlayer's -slave option, which tells the program to accept commands from the stdin stream instead of keystrokes. Combine this with the -input option, and commands are read from a file, or a FIFO. For instance, try this in one terminal:

mkfifo ~/mplayer-control
mplayer -slave -input file=/home/user/mplayercontrol
filetoplay

Then, in another terminal or from a script, enter:

echo "pause" >~/mplayer-control

This command will pause the currently running MPlayer, and issuing the command again will resume playback. Note that you have to give the full path of the control file to MPlayer, with /home/user and so forth, because ~/mplayer-control alone won't work. There are plenty of other commands you can send to MPlayer - indeed, any keyboard operation in the program triggers a command that you can use in your control script. You can even operate MPlayer from another computer on the network, using SSH or Netcat. See this example:

googletag.cmd.push(function(){googletag.display('dfp-advert-2')});

ssh user@host "echo pause >mplayer-control"

Here, we log in to a remote machine (host) with the username user, and run a command to send pause to the remote machine's MPlayer control file. Of course, this can be made much faster if you have SSH key authentication enabled, as you don't need to give the password each time.

Share files the easy way
------------------------

File sharing with Samba or NFS is easy once you've got it set up on both computers, but what if you just want to transfer a file to another computer on the network without the hassle of setting up software? If the file is small, you may be able to email it. If the computers are in the same room, and USB devices are permitted on both, you can use a USB flash drive, but there is also another option.

Woof is a Python script that will run on any Linux (or similar) computer. The name is an acronym for Web Offer One File, which sums it up fairly well, as it is a one-hit web server. There's nothing to install; just download the script from the homepage at www.home.unix-ag.org/ simon/woof.html and make it executable, then share the file by entering

./woof /path/to/myfile

It will respond with a URL that can be typed into a web browser on another computer on the network - no software beyond a browser is needed. Woof will serve the file to that computer and then exit (you can use the -c option to have it served more times). Woof can also serve a directory, like so:

./woof -z /some/dir

This will send a gzipped tarball of the directory, and you can replace -z with -j or -u to get a bzipped or uncompressed tarball. If others like Woof and want to use it, you can even let them have a copy with

./woof -s

Find lost files
---------------

Have you ever saved a file, maybe a download, then been unable to find it? Maybe you saved it in a different directory or with an unusual name.

The find command comes in handy here:

find ~ -type f -mtime 0

will show all files in your home directory modified or created today. By default, find counts days from midnight, so an age of zero means today.

You may have used the -name option with find before, but it can do lots more. These options can be combined, so if that elusive download was an MP3 file, you could narrow the search with:

find ~ -type f -mtime 0 -iname '*.mp3'

The quotation marks are needed to stop the shell trying to expand the wildcard, and -iname makes the match case-insensitive.

Incorrect permissions can cause obscure errors sometimes. You may, for example, have created a file in your home directory while working as root. To find files and directories that are not owned by you, use:

find ~ ! -user ${USER}

The shell sets the environment variable USER to the current username, and a ! reverses the result of the next test, so this command finds anything in the current user's directory that is not owned by that user. You can even have find fix the permissions

find ~ ! -user $USER -exec sudo chown ${USER}:"{}" \\;

The find man page explains the use of -exec and many other possibilities.

Bandwidth hogs
--------------

Have you ever noticed that your internet connection goes really slowly, even though you're not downloading anything? Because of the way most asymmetric broadband connections are set up, if you saturate the upload bandwidth, downloads become almost impossible.

This is because of the way the traffic is queued by the modem and the ISP. Even the slowest and lowest-bandwidth operations, like using a remote shell or looking up a DNS address, become painfully slow or time out. If you're using something like a BitTorrent client to upload, you can limit the upload rate, which avoids this problem. Some other programs, like rsync, have a similar feature, but many do not. Also, running two such programs will still cause problems, if each has been told it can use 90% of your upstream bandwidth.

One solution is a handy script called Wonder Shaper, which uses the tc (traffic control) command to limit overall bandwidth usage to slightly below the maximum available. Get it from http://lartc.org/wondershaper, put the wshaper script somewhere in your path - /usr/ local/bin is a good choice -and edit the start of the script to suit your system. Set DOWNLINK and UPLINK to just below your maximum bandwidth (in kilobits/s) and run it. You should now find that heavy uploads, like putting photos on Flickr, no longer drag your modem to its knees. When you're happy with the settings, set it to run at boot with whatever method your distro uses.

Fix broken passwords with chroot
--------------------------------

Whether you're a sysadmin in charge of mission-critical data centres or a home tinkerer, Live CDs are wonderful to have around for when you get into trouble. If you manage to mess something up, you can boot from a Knoppix, Ubuntu, GRML or one of several other Live CDs, mount your hard disk partitions and edit whatever files are needed to recover from your troubles. However, there are some things that can't be fixed this easily, because they need you to be in the system that needs fixing.

The solution is to use the chroot (change root) command, which sets up a working environment within a directory. Note that the root in the name refers to the root directory, not the root user (or superuser) although the root user is the only one allowed to run this command. Chroot sets up a 'jailed' system within the specified directory, one that has no access to the rest of the system and thinks that the given directory is the root directory. To fix a broken password, for example, you could boot from a live CD, mount your disk's root filesystem at /mnt/tmp and do this:

sudo -i
mount --bind /dev /mnt/tmp/dev
mount -t proc none /mnt/tmp/proc
chroot /mnt/bin/bash

The first line is needed to become root on Ubuntu. The next two make the /dev/ and /proc directories available inside the chroot, and the last one enters the chrooted directory, running a Bash shell. Now you can run passwd, or any other command you need, and finish off with logout or press Ctrl-D to exit.

Password-free SSH
-----------------

Using SSH to connect to a remote computer is convenient, but it has a couple of drawbacks. One is that you have to type the password each time you connect, which is annoying in an interactive shell but unacceptable with a script, because you then need the password in the script. The other is that a password can be cracked. A complex, random long password helps, but that makes interactive logins even more inconvenient. It's more secure to set SSH up to work with no passwords at all. First you need to set up a pair of keys for SSH, using ssh-keygen like this to generate RSA keys (change the argument to dsa for DSA keys).

ssh-keygen -t rsa

This creates two files in ~/.ssh, id\_rsa (or id\_dsa) with your private key and id_rsa. pub with your public key. Now copy the public key to the remote computer and add it to the list of authorised keys with

cat id\_rsa.pub >>~/.ssh/authorized\_keys

You can then log out of the SSH session and start it again. You will not be asked for a password, although if you set a passphrase for the key you will be asked for that. Repeat this for each user and each remote computer. You can make this even more secure by adding

PasswordAuthentication no

to /etc/ssh/sshd_config. This causes SSH to refuse all connection without a key, making password-cracking impossible.

Block script kiddies
--------------------

Are you fed up with your system log filling up with reports of hundreds (or even thousands) of failed SSH login attempts as script kiddies try to get on your machine?

These do no harm as long as they fail but they're still annoying. Thankfully, there are a number of ways to avoid them. The best - provided you will never need SSH access from outside your network - it to close port 22 on your router, then no-none can get in. Another option is to run a program like Fail2ban (http://fail2ban.sourceforge. net) or DenyHosts (www.denyhosts.net). These watch your log files for repeated failed login attempts from the same IP address, then add that IP address to your firewall rules to block any further contact from there for a while.

The third option is ridiculously easy. Attempts to crack SSH generally assume it runs on the standard port 22; change that to a random, high-numbered port and the crack attempts magically disappear. Edit /etc/ssh/sshd_config and change the Listen directive to something like this:

Listen 31337

and restart sshd. The only drawback of this is the inconvenience of having to add this port number to the ssh command everytime you log in, but you can use an alias to take care of that:

alias myssh ssh -p 31337

Reclaim disk space
------------------

Filling a partition to 100% can have an unpleasant effect on your system. When services and other programs cannot write to their log files, or cannot save data in /var, you could be in trouble. These programs won't be able to save their data, and typically quit out (or, in some extreme cases, crash dramatically!). To avoid this, the ext2 and ext3 filesystems reserve 5% of their capacity for only root processes to use. This is a good idea, but 5% is a lot on large drives - for instance, it's 25GB on a 500GB drive. Also, there is no need to reserve any space on a filesystem not used for root files, such as /home.

The good news is that not only is this 5% not hardcoded into the filesystem, it can be changed on the fl y without disturbing the your data and files. Tune2fs is used to tune various parameters of an ext2 (or ext3) filesystem. It can be used to change the volume label or the number of mounts between forced execution of fsck and a host of other, more esoteric settings, but the options we are interested in here are -m and -r. The former changes the percentage of filesystem blocks reserved for the root user, while the latter uses an absolute number of blocks. So:

tune2fs -m 2 /dev/sda1

reduces the reserved area to 2% of the filesystem, which may be more appropriate for if you have a large / or /var filesystem. If you're using a drive of 500GB or larger, this is the best option.

This line of code:

tune2fs -r 0 /dev/sda1

sets the filesystem to have no reserved blocks, a good setting for /home that doesn't need a reserved area for the superuser.

Create packages
---------------

Downloading an application's source code and compiling it yourself. This is a straightforward task with 90% of the software out there, but it can cause problems with dependencies. While the various package managers have ways of working around this, there is another way.

When building from source using the standard autotools method of ./configure && make && make install, install CheckInstall first. You can get this from www.asic-linux. com.mx/~izto/checkinstall although it may well be in your distro's repositories. Run this instead of make install and, instead of installing the new files directly to your filesystem, it first builds a package and then installs that. CheckInstall works with Deb, RPM and Slackware packages. You can specify the type in a config file, or it will ask when you run

./configure && make && checkinstall

Apart from the package type, CheckInstall asks for some other details. Most of these are optional, or can be left at the defaults, but make sure the name matches the older version you are replacing, otherwise your package manager will get confused. Installing with CheckInstall also makes it simpler to remove the package, as there is no need to keep the source directory around, and some programs don't have a make uninstall option anyway.

Get your cds in order
---------------------

True Unix hackers know that changing directory can be done in all sorts of different ways, and with all sorts of different features, so soon everyone learns that the humble cd command can actually be their best friend. You should already know that cd ~ takes you to your home directory, but real hackers don't waste two keystrokes on nothing: just type cd to get the same result. If you just straighten that squiggle a little, ~ becomes - and you get cd -, the command to navigate to and from the previous directory.

For more advanced users, cd - just isn't enough, because it only lets you go between the current directory and the previous one. A better system is to use pushd and popd in place of cd. So, rather than typing cd mydir use pushd mydir - it remembers the directory where you were, then cds into mydir. You can run this on all sorts of different directories, and Bash will remember your entire trail. When you want to step backwards, just type popd to go to the previous directory.

Finally, don't you hate it when you're in a symlinked directory and you've no idea where you are? Worse, running pwd to print the working directory makes it look like you're not in a symlink at all. If this happens to you, just use the -P parameter (ie pwd -P) to make it resolve the symlink and show you where you really are. And if you want to cd into the real directory rather than the symlink, just use cd \`pwd -P\`.

Reverse SSH
-----------

SSH is one of the most versatile tools for Linux, but most people only ever use it one way - to use the server to send data to the client. What you might not know is that it's also possible to switch the usual logic SSH and use the client to send data to the server. It seems counterintuitive, but this approach can save you having to reconfigure routers and firewalls, and is also handy for accessing your business network from home without VPN.

You'll need the OpenSSH server installed on your work machine, and from there you need to type the following to tunnel the SSH server port to your home machine:

ssh -R 1234:localhost:22 home_machine

You'll need to replace home_machine with the IP address of your home machine. We've used port number 1234 on the home machine for the forwarded SSH session, and this port needs to be both free to use and not blocked by a local firewall. Once you've made the connection from work, you can then type the following at home to access your work machine:

ssh workusername@localhost -p 1234

This will open a session on your work machine, and you will be able to work as if you were at the office. It's not difficult to modify the same procedure to access file servers or even a remote desktop using VNC. The only problem you might find is that the first SSH session may time out. To solve this, open /etc/ssh/sshd.conf on your work machine and make sure it contains 'KeepAlive yes' and 'ServerAliveInterval 60' so that the connection doesn't automatically drop.

Safe-delete command aliases
---------------------------

We all know that horrible feeling: you type rm * and as your finger heads towards the Enter key, the horrifying realisation that you are in the wrong directory hits you, but you can only watch helplessly as your finger completes its short but destructive journey, sending your files to a swimming oblivion of zeros and ones.

By default, many Unix commands are destructive. rm deletes files, cp and mv overwrite them without hesitation or mercy. There are options to add a level of safety - the -i or --interactive arguments for the above three commands will ask you to confirm your intent after each step - but if you had time to stop and think about using them, you'd have time to check you were in the right directory or whatever. If you'd like these to be the default, add these lines to /etc/profile or ~/.bashrc.

alias cp='cp -i'
alias mv='mv -i'
alias rm='rm -i'

to have these commands run with the -i option by default. You can always use -f if you want to enable maximum destructiveness.

Aliasing a command to itself is not limited to preventing file armageddon - you can also add options that improve the output of a command; such as adding -h to ls or df to give sizes in human readable KB, MB or GB.

Clarify your codecs
-------------------

The trouble with having lots of video files is that they're often using lots of different file formats - and there are dozens of different codecs to encode both the video and audio streams.

You're probably familiar with the wonderful MPlayer, but what you may not know is that there's a sister utility called MEncoder. It's built from the same code base as MPlayer and as a result is capable of converting to and from all the same formats as its accomplished sibling. MEncoder runs from the command line, and can be a little less than intuitive for the beginner; there are just so many parameters. Just take a look at MEncoder's man page!

The mencoder command basically uses four different parameters to work out how you want to convert your file. The first part is the input; the second is the output video codec, the third for the output audio codec followed by the final parameter for the command's output. A typical MEncoder command looks like this:

$ mencoder input.avi -ovc lavc -ovc -lavcopts vcodec=mpeg4:vhq:vbitrate=1200 -oac copy -o output.avi

This looks hard, but it isn't really. input.avi is the file to be processed, and -ovc lavc tells MEncoder which output codec to use. The parameters that follow are the options for the codec. In this case, we specify MPEG4 (equivalent to DivX) with a variable bit-rate of 1200. The -oac copy is where the audio output codec should go, but in this case we're simply copying it into the source file, which is the final parameter.

The great thing about MEncoder is that it really takes advantage of your Linux system. For example, you can use a television input for the source file, or pass the video through a filter. You can even remove the bars you see in widescreen films using the crop command.

Smart untarring
---------------

There's a routine to extracting tarballs that starts with opening a console, changing to the directory of your tarball and then typing the tar command, followed by the switches for whichever archive you're trying to extract. This is where there's a slight problem. Admittedly, it's not a big one, but when you do this enough times, it starts to become a real annoyance. The trouble is that you need to be able to remember what kind of archive you're un-tarring before you auto-complete the file name. It's usually either bz2 or gz, but you need to specify either a 'z' or a 'j' before you know.

We can script our way around this by using the file command to determine the file type, and then passing this through a conditional 'if' to determine the correct command for extraction. You could choose to embed your default switches into the script, but in this case they're just passed on to the command. The script starts by defining the file type, using the following code:

#!/bin/bash
FILE_TYPE=$(file -b $2|awk '{ print $1}')

With the 'b' switch, the file command returns only a brief line of data, with the first string being the actual file type. This is extracted from this line by piping the output through awk. We then just need to use 'if' to execute the correct command:

if \[ "$FILE_TYPE" = "bzip2" \]; then
tar "$1j" "$2"
elif \[ "$FILE_TYPE" = "gzip" \]; then
tar "$1z" "$2"
fi

Obviously, it's easy to add your own types and make this part more comprehensive. You now need to save your script with a convenient name (we chose lfx) and place it in your path (such as ~/bin). Un-tarring a file is then as easy as typing:

$ lfx xvf ~/testfile.bz2

Old favourites in Bash
----------------------

It's always worth revisiting forgotten bash commands. Three of the most useful that seem to have fallen from common use are cut, paste and the translate command, tr. cut and paste do exactly what you'd expect, and though they sound mundane it's surprising how powerful they can be when used either in the command line or within a script.

cut is generally a little more useful than the paste command. Running cut takes part of a line and redirects it to the standard output. By default, it uses tab as the field separator, but this can be changed using -d, and fields are selected using the -f flag.

paste effectively allows you to merge contents in columns, like a vertical cat. The best way to see how this works is to create two text files, each with three separate lines of data. The output of paste will be the contents of the first file in a column to the left of the second.

The tr command is used for deleting extraneous output, such as spaces or tabs. The most useful option is -s, which removes repeated sequences of a single character. Take the output ls -al, which generates a long directory listing including the size of files padded with spaces for better-looking output. The tr command can be used to remove these, and provide a single space character for field separation.

Here's an example of how these commands can work together:

ls -al --sort=size /usr/bin | tr -s ' ' | cut -d ' ' -f 5,8

The long output of ls is sorted and then piped to the translate command. This removes the padding, leaving each field separated by a single space. cut then uses the space character as a field delimiter, and takes fields 5 and 8 from the output. What you get is a list of files, sorted by size, displaying only the size and the filename.

Remote windows
--------------

The X Window System uses a client-server model to create a display. Most of the time you don't notice, because the client and the server are running on the same machine, but it was developed this way to allow remote X clients to connect to a central X server. You could think of it as a thin client, where the X client consists of just a keyboard and a monitor, connected to the server. The positive side-effect is that this remote functionality is just underneath the surface of your Linux box.

SSH forwards X windows sessions automatically, which means that if you start an application on a remote machine from an SSH console, the application window will appear locally. The window is communicating with the remote machine using the X protocol, which is why there is a delay every time you resize the window or click within the user interface.

xterm -display :0 -e klamav &

If the above piece of code is run from an SSH console connected to a remote machine, it would open Xterm and run KlamAV on the remote screen rather than your local one - you wouldn't be able to see it on your screen. This is useful if you need to start an application remotely, such as an email client or virus checker.

The important part of the command is the display parameter. Here, this is :0, which is the first screen on the remote system. This is because X uses IP addresses and ports to specify a destination, and we've simply omitted the address, which implies the local machine. You could use localhost:1 to specify the second screen.

The -e parameter that follows will run an application from the opened Xterm, opening KlamAV on the same screen as the Xterm console. You could also use the nohup command, so that when the SSH session is terminated, the application that's running remotely won't be.

Sdrawkcab
---------

The usual command for reading a text file is cat (or less if you want to read it page by page, but that's not what we're talking about here). This starts at the start and ends at the end, which is pretty logical but not always what you want. If you want to read a file backwards (say when reading a log file and you want the most recent entries first) just run cat backwards. That's right: tac does the same as cat but backwards.

What if you don't want any particular order but want the lines of the output randomly mixed up? For that we use the command shuf. Now this may not be particularly useful with logfiles (OK, it's completely useless with log files) but what if you have a list of music files you want to pass to a music player? The input doesn't have to be a file, it can be standard input, so you can play your Ogg Vorbis files in random order with one of

ls -1 ~/music/**/*.ogg | shuff | mplayer -playlist -

or

mplayer $(ls -1 ~/music/**/*.ogg | shuff)

Gconf wallpapers
----------------

Gconf works more like the Windows registry editor, and enables you to get access to many of the hidden options and settings behind an app that aren't editable in any other way. You can browse all the possible parameters by firing up Gconf-editor from a console. This is a front-end to the thousands of settings that Gnome keeps in the background.

To find the path to your desktop background, open the Desktop folder, followed by Gnome and Background. This will display a list of settings that are applicable to your desktop background. This includes how your image is scaled, opacity value etc. The path to the image is found under the picture_filename parameter.

The clever part is that you can change these settings from the console, and therefore from your own scripts. Once you've found the parameter you want to change using Gconf-editor, use gconftool-2 to change this and synchronise the change so it's updated immediately. The following command will change your background to test.png:

gconftool-2 --type str ---set /desktop/gnome/background/ picture_filename test.png

We've used exactly the same path to the parameter that we used when navigating the folders in Gconf-editor. The type parameter defines the value as a string because the filename is just text. You could swap set with get to display the path to your current desktop image. Now try changing icons, setting the default file manager mode, or even adding email accounts in Evolution.

Nice, nice baby
---------------

Most Linux users know of the nice command but few actually use it. Nice is one of those commands that sound really good, but you can never think of a reason to use. Occasionally though, it can be incredibly useful. Nice can change the priority of a running process, giving it a greater or smaller share of the processor. Usually this is handled by the Linux scheduler. The scheduler guarantees that processes with a higher priority (like those that involve user input) get their share of the resources. This should ensure that even when your system is at 100% CPU, you will still be able to move the windows and click on the mouse.

The scheduler doesn't always work smoothly, however; certain tasks can take over your computer. This could be a wayward find command that's triggered by a distro's housekeeping scripts; or encoding a group of video files that makes your computer grind to a halt.

You'd typically hunt these processes out with the top comand before killing them. Nice presents another, more subtle and more useful option. It reduces the offending task's priority so that your system remains usable while still serving the offending process. Running a command with a different priority is as easy as entering

nice --10 updatedb

This runs the updatedb with a reduced priority of -10. If you run top you can see the nice value under the column labelled 'NI'.

If you wish to reduce the priority of a program that's already running, you need to use the renice command with the process ID:

\# renice -10 -p 1708217082: old
priority 0, new priority -10

This will also reduce the process's priority by 10, and depending on the nice value of the other processes, will lessen the amount of CPU time it will share with the other tasks.

SSH by proxy
------------

Cryptographic tunnels are a useful way to establish a secure connection between your local PC and a remote machine or server. If you use VNC, the remote desktop client, you've probably already burrowed your way through a tunnel; a sensible technique is to use SSH, which is commonly employed for remote logins.

One of the best uses of SSH tunneling is to access Webmin, the remote config tool that runs on a web server. You can change almost anything on your system using Webmin, so it's unwise to leave it open to the internet. But if you close it off, you lose the ability to configure your machine. You can get around this limitation by tunneling with SSH from the port that Webmin uses to your local machine, like so:

ssh -L 8090:localhost:10000 remotehost

Just point your web browser at https://localhost:8090 to connect to your remote Webmin server. You could also forward a proxy service using SSH. If you were at a location where you couldn't access Google or eBay, for example, you could create a tunnel to the proxy server and browse from there. Most distributions include a proxy server, such as Squid. This needs to be installed and running on the remote machine first. Squid uses port 3128, so the command to tunnel Squid would look something like this:

ssh -L 8090:localhost:3128 remotehost

It's then just a matter of configuring your browser to use localhost:8090 as the proxy server, and all subsequent web requests will be passed through the SSH tunnel. Using a proxy server in this way enables you to connect to other machines on the proxy's local network, such as 192.168.1.1, and that also includes services like router configuration servers.

No one can hear you screen
--------------------------

Virtual terminals are like children: having one, two or even three brings joy to your life, but more than that puts a strain on your resources. When working remotely, some people miss having the ability to open mutliple terminals, so they simply open many SSH connections to the same machine. Not only is this a waste of bandwidth, it's also a sign you're a newbie - which you're not, right? Veterans know there's a much better way to open multiple terminals, and it comes in the form of the GNU screen program. To get started, open up a terminal, type screen, then hit Enter. Your terminal will be replaced with an empty prompt and you may think nothing has changed, but actually it has - as you'll see.

Type any command you like, eg uptime, and hit Enter. Now press Ctrl+a then c, and you should see another blank terminal. Don't worry, your old terminal is still there, and still active; this one is new. Type another command, eg ls.

Now, press Ctrl+a then 0 (zero) - you should see your original terminal again. As you can see, Ctrl+a is the combination that signals a command is coming - Ctrl+a then c creates a new terminal, and Ctrl+c then a number changes to that terminal. You can use Ctrl+a then Ctrl+a to switch to the previously selected window, Ctrl+a then Ctrl+n to switch to the next window, or Ctrl+a then Ctrl+p to switch to the previous window. To close windows, just type exit.

When your last window is closing, you also exit screen and it will print 'screen is terminating' to remind you. Alternatively - and this is the coolest thing about screen - you can press Ctrl+a then d to detach your screen session. Then, from another computer later on, use screen -r to pick up where you left off, with all the programs and output intact just as you left it - magic!

Better than a browser
---------------------

If you often need to retrieve pages from the net and find that using a browser is like using a sledgehammer to crack an egg, then wget is for you. Its info page soberly describes it as a utility for the non-interactive download of files from the web; but what they're trying to say is that sometimes it works better than using a browser. You can use wget in a script to download web pages or files, and it's perfect for synchronising local web archives. You don't have to use it in a script either - it works just as well when executed directly from the shell (http://wget.sunsite.dk).

The most straightforward use for wget is to simply download a file referenced by a URL:

$ wget http://localhost/somefile.tar.gz

This should present you with a text-based download bar. Unfortunately, if the site uses the HTTP protocol, wget won't support wildcards; so you couldn't use *.gz for downloading multiple files (but you could if the site used FTP instead). wget is used most often to mirror a whole website. Here's an example for downloading a site:

$ wget --mirror -p --html-extension --convert-links http://localhost

Wget traverses the site and downloads the content into the current directory. The mirror argument enables options suitable for mirroring a website - in particular, recursion for traversing the whole website tree. htmlextension is used for sites that use either CGI scripts to generate HTML, or ASP files that need to be renamed after they're downloaded. If wget recognises the contents, it will just add the HTML extension.

After the transfer has finished, wget goes through the local files to change any remote references so the site can be viewed offline.

Killing zombies
---------------

If you spend any time looking at your process list, sooner or later you're going to come across one that's labelled 'defunct'. Before we explain what a defunct process is and how to remove it, here's a brief overview of how to query the process table using the ps command.

Typing ps ux will list all the processes attributed to the current user, and you can specify another user name with ps U username. One of the most common uses for ps is to list all the processes running on the system, and this can be achieved by using ps aux. Breaking this command down, the a will list all the processes rather than those of a single user, the u is the level of details returned for each process, and x lists processes such as daemons that weren't started from a terminal.

A defunct process is one that was started by another process (the parent), but has finished without the parent waiting for completion. This can happen if the parent process has hung or crashed.

Defunct processes are also known as zombies, and listed with a 'Z' status in the output from ps. They're not quite as destructive as the living dead, as they consume almost no system resources, but on a system that's always turned on, such as a server, they can become equally distracting. The key to killing a defunct process is to first kill the parent, which will be listed in the output of ps with the addition of -l for long output. Parent processes can be identified under the PPID column, as opposed to the PID column for the process ID. These are identifiers attached to each process running on your system. They can be killed using another common shell command, kill -9, followed by the PPID. Obviously this will stop the parent task, so first make sure it's not essential. Once the parent process has been killed, the system init process should send the correct signal to the defunct process, which should terminate automatically.

Safe keys
---------

We rely on encryption to keep our data safe, but this means we have various keys and passphrases we need to look after. A GPG key has a passphrase to protect it, but what about filesystem keys or SSH authentication keys. Keeping copies of them on a USB stick may seem like a good idea, until you lose the stick and all your keys enter the public domain. Even the GPG key is not safe, as it is obvious what it is and the passphrase could be cracked with a dictionary attack.

An encrypted archive of your sensitive data has a couple of advantages: it protects everything with a password (adding a second layer of encryption in the case of a GPG key) and it disguises the contents of the file. Someone finding your USB key would see a data file with no indication of its contents. Ccrypt (http://ccrypt.sourceforge.net) is a good choice for this, as it give strong encryption and can be used to encrypt tar streams, such as

tar -c file1 file2... | ccencrypt >stuff

and extract with

ccdecrypt <stuff | tar x

If you really want to hide your data, use Steghide (http://steghide.sourceforge.net) to hide the data within another file, such as a photo or music file

steghide embed --embedfile stuff --coverfile img_1416.jpg

and extract it with

steghide extract --stegofile img_1416.jpg

A history lesson
----------------

While command completion is one of the most used and lauded aspects of Bash, an equally powerful feature often gets ignored. The history buffer, commonly used for skipping backwards and forwards through the previous commands list, offers plenty more possibilities than might otherwise be imagined. While it's easy enough to cursor up through the list, sometimes the command can be so far back in the history as to make this approach unfeasible. The history command can print the whole buffer to the screen. The most obvious use for this is to redirect the command's output into grep to find a partially remembered command.

$ history | grep "command"

If the command is still in the buffer it will be displayed along with the numeric position it occupies. This command can then be re-executed simply by taking this number and prefixing an exclamation mark to the position. For example, !1016 would execute the command at point 1016 in Bash's history. Another trick is to follow the exclamation mark with part of a previous command. The history will then be searched and when a match occurs, this will be executed.

!cd would execute the last cd command in the buffer. Sadly, these commands don't add themselves to the history buffer, so recursive execution isn't possible. Another way of accessing the command history is through the search function accessed by pressing Ctrl-R from the prompt. After pressing this control sequence, you will be presented with a search prompt. Typing in the search term brings up the first command that matches the criteria, and pressing return will execute the command. Cursor left or right will insert the command on to the prompt, while up and down takes you to the previous and next commands as usual.

Winning arguments
-----------------

We can't teach you how to be the victor in every debate, but we can show you how to master another type of argument: those of the command-line. You probably already know about supplying multiple arguments to a program, for instance:

someprog file1 file2 file3

That's all good and well when you're entering commands by hand, but what if you want to use a list generated by another program? Say, for example, you want Gimp to open the ten largest images in a directory. You could do an ls -l to find out what's biggest, and then laboriously enter each filename as in gimp file1 file2... Or you could use the magic that is xargs (included in every distro).

ls -S --color=never | head -n10 | xargs gimp

xargs assembles complicated command-line operations using lists of files, so you don't have to type them manually. You pass xargs a list of files, and it arranges them into file1 file2 file3... as we saw before. Makes sense? Consider the above example. First we use ls to generate a list of files in the current directory (making sure we disable the colour codes as they produce unwanted characters). Then, using the good old pipe (|), we send the results to the head utility, which grabs the first ten entries.

So now we have a list of ten files. How do we tell Gimp that we want it to open them? We can't just directly pipe the results of head through, because Gimp would think it was raw graphics data. This is where the addition of xargs saves the day: it ensures that the following program name uses the data as a filename list, rather than trying to work with it directly. In our example above, it says "Take the top ten list as generated by head, and then pass it to Gimp in the traditional file1 file2 file3... format. You can do lots of things with xargs, all it expects is a list of files, separated by newline characters or spaces. As another example, this line deletes all files older than ten days (use with caution!):

find . -mtime +10 | xargs rm

Convert and mogrify
-------------------

ImageMagick is as perennial as the grass. Found in everything from PHP scripts to KDE applications, it's a featureful bitmap editing and image processing library with a battalion of small tools. There are well over 100 of these tools, and two of the most useful are convert and mogrify - commands that rival Gimp for features. Using either, you can resize, blur, crop, sharpen and transform an image without ever needing to look at it. The difference between convert and mogrify is that with the latter you can overwrite the original images, rather than create a new file for your modified images.

Despite all this complicated functionality, one of the best reasons for using convert is its most obvious function - and that is to change the format of an image. At its simplest, you just need to include a source and destination filename, and convert will work out all the details. The following example will convert a JPEG file to a PNG:

convert pic.jpg pic.png

ImageMagick is perfect for batches of images, but it doesn't use wildcards in quite the way you expect. convert *.jpg *.png won't work, for example. The answer is to use a slightly different syntax, and replace the convert command with mogrify. Rather than use a wildcard for the destination format, we define the type we want with the format extension. To convert a group of JPEG images into the PNG format, we would just type the following:

mogrify -format png *.jpg

This approach can be used with any of the convert and mogrify parameters. You could use replace format with crop or scale on a batch of images, for example, if you needed to scale or crop a whole directory of images.

Bash it up
----------

The Bash prompt is one of those unchanging things that most people take for granted. This is odd, because it's a simple matter to change the text that greets you when you open a new shell to something more useful. The Bash prompt used by most distros is the username followed by the domain name (graham@localhost).

The key to changing the prompt lies in dynamic variables, which allow you to embed useful information into the prompt. To create the username/domain prompt that many distributions use, you could type the following; or add it to ~/.bash_profile or ~/.bashrc to make it permanent:

export PS1="\[\\u@\\h\]$"

The export command is setting the PS1 environment variable. This is used to hold the value of the prompt, which is contained within the double quotes after the equals symbol.

This value is two dynamic variables either side of the @; \\u displays the username, while \\h will insert the first part of the hostname. Bash includes many other dynamic variables, including \\w for the current working directory, \\d for the current date, or \\! for the current position in the history buffer. If they look familiar, that's because they're escape sequences, found in many applications and programming languages and used to format strings.

There are other sequences, such as the following, which changes the name of the console window:

"\\e\]2;title\\a"

There was a time when a hacker's mettle would depend on an obtuse and complex command prompt, and there really isn't a limit to what you can add. Many used simple conditional loops to change the content of the prompt whenever a new shell session was started, but using a few simple escape sequences, it's simple to change the default prompt to something far more useful.

Text messaging
--------------

As we all know, computers are here to do the monotonous stuff that we can't be bothered to do. That means things like adding and subtracting numbers, drawing things in pretty colours and reminding their all-powerful masters of upcoming appointments. There are dozens of reminder applications that pop up with annoying little messages when you're late for the dentist. But you don't really need to use one: you can get the same kind of functionality using a couple of commands from the trusty old terminal. The commands in question are at and xmessage.

The at command is one of those essential tools that most users have come across at one point or another. In essence, you type at 4:57 pm today into the command line, and at will open a primitive text editor. In the editor, you simply add each command you want executed at 4:57, followed by pressing Ctrl and D at the same time to signal the end of the file. Each command should look just as it would on the command line, and you can even use different formats for the time, such as 1657 for the 24-hour clock (military time for our American readers), or 'now + 2 hours', as well as specifying the day as 'Saturday' or 'tomorrow'.

The command we need to use to pop an alert to the screen is xmessage. This is a very simple tool that dates back to the earliest years of X Windows, and will simply open a small window on your screen that includes a text message and a close button. The syntax for the xmessage command goes like this:

xmessage -display :0.0 "You are late"

The display part of the command is important because it lets xmessage know which screen to use. If you add the command to at, you've got a flexible method for giving yourself reminders without having to resort to a separate application. This is often easier than using something like Cron, which can be a little daunting when all you want to do is run a simple command such as xmessage!

Linux sux
---------

Most of the time people use su on the command line, to give themselves system administrator privileges so they can edit an important configuration file. But you'll also find yourself using su when you're working in a console and want to use a graphical application. When you try to run a graphical app while logged in as a different user, you get the following error:

Xlib: connection to ":0.0" refused by server.

The problem is that the keys used to authenticate your X session aren't valid when you switch to a different user. This security measure may seem overzealous, but it's a system inherited from a time when X sessions were designed to be run over a network. There are two answers to this problem.

The first is to make sure that the new account can be authenticated on the X server. This uses the xhost command to authenticate new users on the local X Windows session. Just type xhost +local:local as the normal user before you switch to a new user, and you should see 'non-network local connections being added to access control list' as output. You will now be able to launch any graphical application on the same screen once you've switched to another user. If you want to have this ability every time you run your X session, just add the xhost command to your .bashrc file: it will be executed automatically whenever you open a new Bash shell. One important problem with this solution is that it becomes possible to introduce an authentication loop if you use su to switch back to the original user. Make sure you use the exit command instead.

The second solution is even easier. It's a replacement for the su command that transfers your X credentials to a new session automatically. The command is sux, which you will need to install manually from your distribution's package manager. Once installed, type sux newuser to switch to the user you want to use your X display. You'll find that you can run graphical applications from the new session without any further configuration.

Rename and prename
------------------

On the command line, there can't be many people who don't use the mv command to rename a file or directory. It's often the quickest way to organise files, although pressing F2 in most file manages will let you do the same thing graphically.

The letters 'mv' are actually short for 'move' - a much more accurate description of what this tool actually does because you can include the path is the part you want to rename. This means that typing mv /usr/bin/sux /sbin/sux won't actually change the name of the file, but will move it from the /usr/bin directory to the / sbin directory. Of course, you could still rename the file as well if you wanted, perhaps moving it to a backup directory and adding the _bak extension. It's flexible enough for renaming and moving single files and directories, but mv doesn't cater for more than one at a time, and this gets tedious very quickly if you need to change more than a few files.

Thankfully, Larry Wall is at hand to save the day with another command you commonly find installed on the average Linux distribution. The command is commonly called rename, but you might have took look for something called prename if rename is used by something else on your system. As you might have guessed, if Larry Wall has something to do with this, it must be a Perl script. You can even open the file with a text editor and check yourself.

The great thing about prename is that it's incredibly flexible for renaming groups of files. But its flexibility is thanks to Perl's powerful expression parser which isn't all that intuitive if you're new to expressions. For example, to add _bak to the end of every file starting with file, you would type the following:

prename 's/\\_bak$//' file*

This is just the beginning though, and after you've mastered the process of generating regular expressions, you can achieve virtually any rename/ move task with prename - it's especially handy for changing upper-case image file names from windows, to lower case file names on Linux.

Crash test dummy
----------------

There are times when a background process that you rely on silently crashes, which can be difficult to detect and rectify. MythTV, for example, relies on a back-end server to record television programs. If the back-end crashes, recordings will be missed. OK, so it should never have crashed in the first place, but until the developers get round to fixing bugs in their application, all we can do is automatically restart the process.

The trick is to launch the process you want to restart from within a simple script. If it crashes, control passes back to the script, which can start it again. This can be done using a simple while loop. It's not great programming, but it does work.

while true;
do
mythbackend;
done

The beauty of this is that when mythbackend crashes, the while loop will simply start it again. We can make the script a little less crude by checking to see if mythbackend is running before the first launch. We just need to count the number of instances of the processes, which we do by grepping the number of instances of the process found using ps. If mythbackend is already running, the number of instances will be a value other than zero, which we can test for using an if statement.

Finally, once the script has been written, we need to make sure that it won't be accidently stopped itself. We can do this by running the script from a shell using the no hangup command, nohup scriptname &.

#!/bin/bash
mcount = 'ps ax | grep
"mythbackend" | grep -v grep | wc -l'
if \[$mcount == 0\]; then
#! Insert 'while true' code here
else
exit 1
fi

Resolving resolv.conf
---------------------

Having more than one network device can lead to problems of priority. Normally only one device has access to the internet. Any supporting devices share that connection or serve data held on the machine behind a firewall. The problem is that the card without the internet connection can take priority over the card with the internet connection. This happens when both network cards are connected to other machines or routers that are acting as independent DHCP servers and provide conflicting information. The result is that network packets destined for the internet are routed through the wrong network device, dropping the connectivity.

The trouble can often be traced to a single config file, /etc/resolv.conf. This is where your system gets the address of the nameserver that it needs to translate the human readable server name (such as linuxformat.co.uk) to a numeric IP address that the network understands (212.113.202.71). If the nameserver can't translate the address, you won't be able to access the internet using readable server names, but you can use the IP address for access.

You can solve this by editing resolv.conf to add the IP addresses of your ISP's nameservers. Even so, after an hour or two the connection might drop. If you look at resolv.conf again, the nameserver addresses will have changed. A DHCP client is running on your machine and is attempting to determine the connection settings every couple of hours. The problem is that this client is prioritising the wrong network card and overwriting the wrong nameserver address into resolv.conf.

This is why the solution can be found in /etc/dhcp3/dhclient.conf. To add the correct server name, open this file in a text editor and add prepend domain-name-servers <nameserver>; (Replace <nameserver> with the IP address of your IP's nameserver). From now on, this address will always be added to resolv.conf first, before any of the wrongly configured DHCP servers. All fixed.

Editor redirection
------------------

If you run a Debian-based distribution like Ubuntu, have you ever wondered what the mysterious /etc/alternatives directory is for? If you take a look at its contents, you'll find that it's full of some of the most common system commands. But if you look closely, each file is really a symbolic link to the real location of the command elsewhere in the filesystem. This directory is full of links because the original Debian developers didn't want to assume one tool would be used over any other. They used the cron utility to highlight the problem.

Cron is used to schedule events to run at a certain dates and time, and it does this by opening a text editor from which you need to add your own jobs. But the big question for the Debian developers was 'Which text editor?' For Linux users, there's no simple answer and it's a question that's caused too many Monty Python-esque Judean Popular People's Front-style flame wars and too much wasted time to provide a definitive answer. Whether users prefer Emacs, Vi or Nano, a mandate to choose one over the other is always going to cause problems.

The solution was /etc/alternatives. If you type cron on Ubuntu, it actually loads the newbie-friendly Nano editor. But if you look closely, cron is actually launching the editor command located in /usr/bin' which is itself a link to /etc/alternatives/editor.

As you might have guessed, this file is a link to the real editor - in this case it's /usr/bin/nano. This is a careful sidestep of the issue of which editor to choose as all you have to do to change the default editor is change the link to point at your favourite rather than Nano. There's even a command that can perform this task for you. Type update-alternatives --set editor /usr/bin/vim to switch the editor to vim, for instance. You can also list the available editors that are acceptable using the -display editor parameter, and its exactly the same for all of the other commands that reside within the /etc/alternatives directory.

Playing with time
-----------------

How many of your machines managed to successfully negotiate the transition out of daylight savings time in October? It's important, because there's more to time than the shiny clock sitting in the corner of your desktop panel - your system is regulated by running things at a certain time. Be it the time embedded in a sent email or the timestamp on a file, everything depends on your system clock.

The simplest way of checking your system clock is to use the date command. When date is executed on the command line, you get a single line of output that contains the date and time in an abbreviated form. You can use this output format to set the date and time as input for the date command, but it's also easily customised. Various options can be used to input or output anything from the time in nanoseconds to which century we're in.

The last field in the output from the date command will tell you which time zone your machine is configured for. If you're in the UK, hopefully this reads 'BST' for British Summer Time at this time of year. The configuration file for this can be traced to /etc/timezone, which will contain a description for your location. For BST, this is likely to be 'Europe/ London'. If this is wrong, you can choose a more suitable time zone from the /usr/share/zoneinfo/ directory. This directory includes a list of many of the more popular places to live on the planet, sorted by continent and country.

There are two clocks on board your system. One is in the system clock, and this is the one probed by date. The other is the hardware clock. This resides in your system BIOS and keeps the time while your computer is turned off. The system clock takes the time from the hardware clock as part of the boot procedure. You can query, and set, the hardware clock using the hwclock command, and by typing

hwclock --systohc

you can set the hardware clock to the same time as the system clock.

Killing time
------------

Once you start using the command line, you use ps time and again for managing your process list. Just typing ps will list the processes that belong to the current session, which unless you're running anything in the background will just be two: the Bash shell (if that's your choice), and the ps command itself. This isn't much use: most people use ps ux to display all the processes they own, and ps aux for listing every system process.

It's easy to find the process you're looking for by passing the output of ps into grep, as with ps aux|grep konqueror. With zombie processes, you typically go hunting for processes when they start to misbehave, before issuing a kill -9 pid to kill off the offender. pid is the process identification number, as listed in the output from the ps command.

But there is another option - using a command called pidof to get the process ID of a process you know is running. Using Konqueror as an example, you would just type pidof konqueror. The output will look something like the following:

pidof konqueror
18380 18021 24825 13081 6478 6473 6472

This means that there are seven instances of Konqueror currently running, and each number is the process ID for each instance. The larger the number, the more recent the process. For example, you could kill the last executed Konqueror by typing kill -9 18380.

One of the most useful aspects to pidof is that you can use it to work out the process ID when you can't manually sift through the output from ps. This is perfect for scripts that need to find and kill a process, or maybe give them a higher or lower system priority, without having to waste time looking through the output of ps.

Lazarus raised
--------------

There's nothing quite like that feeling of horror you see when you get the

No usable partitions/No OS found

message from the over helpful BIOS. It usually takes a few seconds to sink in - your hard drive has failed, or is failing, and it no longer boots to the operating system. There are many reasons why this could have happened and each varies in the severity of potential data loss. With a broken hard drive, you might lose everything. But it could also be the result of a simple boot loader error or overzealous distro installation. In these cases, there's a good change your data may survive intact - but what do you do? Those of you who keep timely backups of your data can sit back, smile smugly and restore their hard work from the latest backup. But despite knowing how important it is, most of us never seem to get around to backing up the data we spend our lives collating. If ever there was a time for the Linux Live CD, this is it.

Live CDs are stuffed full of tools that can be used to resurrect a hard drive, and many of these Linux tools rival or surpass the functionality of most commercial solutions. The first thing to do is mount the lost drive from the Live CD.

We'd suggest using PCLinuxOS as we've found this the best distro we've seen for finding and mounting wayward partitions. It also does a good job of finding Windows NTFS partitions on the same drive. PCLinuxOS will automatically detect any it finds and mount them onto the desktop. You should then be able to copy your data to a safe place. If this doesn't work, your saviour is going to be typing testdisk from a root console.

Testdisk is one of the most underrated Linux tools and can really make the difference between losing or keeping everything. It's perfect for restoring broken MBR records and for rebuilding partitions tables.

Paint by numbers
----------------

We all like a little bit of colour in our lives, and just because the Linux command line is a text interface to the inner-workings of your system, it doesn't mean that it needs to suffer the same monochrome fate as printed text. This tip will show you how to escape!

There are various ways to add colour, and one of the most popular is accomplished with the help of a command called dircolors. If this spelling offends you (American readers, look away), you could always use a symlink similar to the following to amend it:

sudo ln -s /usr/bin/dircolors /usr/bin/dircolours

Dircolors will make different file types appear as a rainbow of colours when you run the humble ls command. If you execute the dircolors command on its own, the output is a confusion of file types and secret codes. These will look something like pi=40;33: or \*.ogg=01;35:. The first part of each entry is the file type, and the second part (after the = symbol) consists of two values that represent a foreground and background colour. If you're confused by some of the cryptic abbreviations in the first part, typing 'dircolors --print-database' provides more verbose output - revealing that pi=40;33: will colour the 'pipe' symbol (pi) with a black background (40) and a yellow foreground (33), for example.

If you look closely at the output from dircolors, you will see that it starts with LS\_COLORS= and ends with export LS\_COLORS. This is because the command is doing nothing more than setting a large environment variable with its list of file types and colours. You could save this output, and add it to the end of your .bashrc file in your home directory to set these colours automatically. But once you've run the dircolors command, your command prompt should start looking like a honey saturated tennis ball in a bucket of hundreds and thousands (aka sprinkles).

Oh, if you don't see any colour after that, try typing ls --color=auto.

Guaranteed screenshots
----------------------

We often have a problem with illustrating game s because the game takes over the display and keyboard and, unless the developers have included an internal screenshot function, it can be hard to grab the contents of the screen and save it to a file. Even when there is a windowed game mode, as with Cold War, you still need to find a way to break the keyboard away from the game and give control back to the desktop before you can use Gnome or KDE's screenshot utilities.

There is a solution for when you can't escape the clutches of an application that's taken over your X Windows session. The clue is that even when you can't get back to your desktop, you can nearly always get back to one of the virtual terminals waiting patiently in the background. Pressing Ctrl+Alt+F1 will switch from your desktop to the text-based login of the first virtual terminal. These terminals hark back to when Unix was a predominantly multi-user environment, and the 'virtual' refers to the fact they are on the local machine rather than a remote dumb terminal.

Other virtual terminals are accessible by substituting F1 with F2-F6, and you can get back to your desktop by switching to the seventh virtual terminal, Ctrl+Alt+F7, which happens to be running your X session. What does this have to do with taking screenshots? Well, as you can get to a command line, you are now able to take a screenshot using one of the many ImageMagick tools you find installed on your system by default.

Here's the command to execute:

chvt 7;sleep 10;import -display :0.0 -window root image.png

This switches to the virtual terminal running X (chvt 7), waits ten seconds, then uses ImageMagick's import command to dump the contents of the screen to image.png. Sorted!

The great SSH escape
--------------------

One aspect of SSH that can make things a lot easier when you open a connection, start a series of jobs and realise you need to forward a port through the current session. The answer is to use an escape sequence while connected with SSH to change certain settings without needing to reconnect.

An escape sequence is just a series of characters that instruct the utility you're using (in this case SSH) to escape from what it's doing and perform a utility-specific task. You're most likely to have come across escape sequences while using the shell. The most useful escape sequence for SSH is executed by you pressing the tilde (~) symbol, followed by a capital C (by holding Shift down at the same time as 'c'). You won't see anything in the session until you've completed the escape sequence, at which point the prompt will change to 'ssh>'. This is to signify that you've been dropped into the SSH command line. From here you can connect a port on the remote machine with a port on the local machine, and tunnel the data between the two through the secure SSH connection.

You can use this technique to tunnel the data from a Squid proxy server through SSH to a local port on your machine using the -L argument, so typing -L8090:localhost:3128 would tunnel Squid to local port 8090 without restarting the SSH session. You can also list forwarded ports by using the ~#, escape sequence, and cancel forwarded ports by typing -Krhostport. To cancel the Squid tunnel we just created, just type -KR3128.

Redirect the masses
-------------------

Even if you're a Linux beginner, it's likely you've already used some form of redirection while using the command line. Redirection uses the > and < symbols to pass data back and forth between commands you're executing. It's most commonly used to redirect output from one command into another file. For example, if you type dmesg >local. log, the contents of the kernel ring buffer (the output from the dmesg command) will be redirected into the local.log file rather than displayed on the screen. If you use two > symbols, the output of the dmesg command would be concatenated on to the end of the file rather than used to overwrite it. Using the < symbol will use the argument as the input, rather than the destination - most commonly used with grep. Typing grep -i USB <local.log would search for 'USB' in the local.log file, for instance.

Redirection works because every Linux application, big or small, has three possible 'file descriptors' to work with for its input and output. These are the standard input, the standard output and standard error. You don't normally notice, because the devices used for standard input and output are usually your screen and keyboard. In our earlier examples, we were addressing the standard input and output descriptors using the >/< symbols. But how do you address the standard error file descriptor? This is achieved by placing the number '2' before the > symbol - the 2 comes from the priority given to each file descriptor. Naturally, 0 is standard input, 1 is standard output and 2 is the standard error output. This is useful because it enables you to filter out error conditions generated by a command, while still sending output to a log file.

Here's an example using find. The common permission errors that result from find not having access rights are sent to the black hole of the null device, whereas successful results are output to the screen:

find / -name *.jpg 2>/dev/null

You should follow us on [Identi.ca](http://identi.ca/tuxradar) or [Twitter](http://twitter.com/tuxradar)

document.write ('<a href="'); document.write('http://www.stumbleupon.com/submit?url=' +document.URL +'&title='+document.title.replace(/ /g,'+')+'">'); document.write ('<img border="0" src="http://cdn.stumble-upon.com/images/160x30\_su\_blue.gif"></a>'); [![](http://cdn.stumble-upon.com/images/160x30_su_blue.gif)](http://www.stumbleupon.com/submit?url=http://www.tuxradar.com/content/command-line-tricks-smart-geeks&title=Command+line+tricks+for+smart+geeks+|+TuxRadar+Linux)  





----


Your comments
-------------

### Holy cmdln batman!

Qjet (not verified) - November 17, 2009 @ 5:09am

Also niceness becomes a lower priority as a processes nice value increase. So a lower priority would be +10. Right?

### Very Informative

John Sabboth (not verified) - November 17, 2009 @ 7:17am

Very nice collection of tricks and tips. Keep up the great work!!!!!!!!!!!

Thanks

### Perl regex

Anonymous Penguin (not verified) - November 17, 2009 @ 10:59am

Hi, nice page. I wonder whether a small mistake took its way into this huge and very instructive tutorial:

prename 's/\\_bak$//' file*

Doesn't it rather remove the last sequence "_bak" from the filename? Forgive my ignorance if I am wrong.

### Linux Consultant & Administrator

Bhaskar Chowdhury (not verified) - November 17, 2009 @ 12:56pm

SSH escape one interest me. Keep up the good work man.

Thanks

### yeah... fantastic!

Anonymous Penguin (not verified) - November 17, 2009 @ 2:50pm

yeah... fantastic!

### nick

nick (not verified) - November 17, 2009 @ 2:52pm

The unnecessary use of \`cat\` in the first example isn't so smart (more and less take a file as an argument), and neither is doing a symlink from dircolours to dircolors; If your user(s) has a preference, they should add an alias instead.

### Thank you very much for

Rata (not verified) - November 17, 2009 @ 3:35pm

Thank you very much for these cool tips

### SSH without password

Dominik (not verified) - November 17, 2009 @ 4:03pm

Instead of adding the public key from the server's point of view  
$ cat id\_rsa.pub >>~/.ssh/authorized\_keys  
you could do it from your local host (client):  
$ ssh-copy-id -i ~/.ssh/id_rsa.pub

### @nick

Anonymous Catter (not verified) - November 17, 2009 @ 4:40pm

<< The unnecessary use of \`cat\` in the first example isn't so smart (more and less take a file as an argument) >>

Yes, but using more or less wouldn't have shown off piping, would it? Besides, I use cat/less like that all the time - usually I run cat, think "damn, the output is too long", then just tap Up on the keypad and add less to the end because it's faster that way.

<< and neither is doing a symlink from dircolours to dircolors; If your user(s) has a preference, they should add an alias instead. >>

Symlinking is the correct solution, because it makes it permanent for all users, across all shells.

### better smarter tar

jkl (not verified) - November 17, 2009 @ 4:52pm

#! /usr/bin/bash  
ZOPT=$(file -b $2|awk '{ print $1}' | sed 's/gzip/-z/; s/bzip2/-j/; s/^tar$//')  
set -x && pax ${ZOPT} $@

1\. Use pax because it's got a sane command line syntax.

2\. Use sed instead of a bunch of switches to set the unzipping switch.

3\. Pass all the options so you can use your script exactly as pax.

4\. Show the executed command in case something went wrong.

### @jkl

TuxRadar - November 17, 2009 @ 5:19pm

Is it OK if we incorporate your script into the article?

### Simple one

BubbaT (not verified) - November 17, 2009 @ 7:44pm

cd ~rms takes you into Stallmans home directory. Assuming of course that Stallman has a home directory on your compputer!

### use ~/.ssh/config with an alias

Elder-Geek (not verified) - November 17, 2009 @ 8:02pm

Even better than using an alias, is adding entries to the config file for ssh ~/.ssh/config and using an alias to that entry

Host myssh  
Hostname 256.110.195.126  
User myself  
Port 27532  
Compression yes  
CompressionLevel 9  
DynamicForward 8080  
LocalForward 5930 localhost:5900

This can be called with ssh myssh  
So now the alias myssh ssh myssh will use all of the above options. In this cas that is SSHing via port 27532 to the host at 256.110.195.125 as the user myself. The connection will have all data compressed to the max, we have a proxy set up on port 8080 and can connect to a running VNC server on the remote host at port 5900 by connecting to port 5930 on our local machine.

One more thing I would add is using tilda or yakuake. These screen or ssh connections can be reached with lightening speed.

### cd -P

xing (not verified) - November 17, 2009 @ 9:06pm

instead of using  
$ cd \`pwd -P\`  
you can use the quicker method of using the -P option with cd:  
$ cd -P .  
obviously, this will also work if you cd into any symlinked dir but want to resolve the link:  
$ cd -P sym/link/

### Very cool.

Gen2ly (not verified) - November 17, 2009 @ 11:37pm

You should have broken this up in parts and named it something like "The Best Command Line Tricks" and you would have gotten a whole bunch of people coming in. :P

In all seriousness though, great tips.

For disk maintenance, I recommend Parted Magic, got all the tools (testdisk, gparted, shredder, clonezilla) all on one disk. For ls colors (You probably know about it, but just in case), in your ~/.bashrc:

eval \`dircolors -b\`

About tar, it now recognizes file types so the -j|z switches aren't really necessary anymore. Just typing xvf (or xf if you don't need to see the output) will do.

### Nice article

Anonymous Penguin (not verified) - November 18, 2009 @ 3:13am

I was disappointed though when I read:

mcount = 'ps ax | grep "mythbackend" | grep -v grep | wc -l'

By that point in the article, I would've thought for \*sure\* that you would be familiar with the ages-old sysadmin trick:

mcount=$(ps ax | grep \[m\]ythbackend | wc -l)

Enclosing a letter in the process name you're searching for in square brackets turns it into a glob, which won't be found by grep in the process list. The double quotes are completely unneeded here. You didn't catch the fact that you used single quotes to enclose this instead of $() or backticks. And finally, you put spaces around the equal sign, which causes bash to try to run mcount as a command, rather than assigning to it as a variable.

Given the high quality of the rest of this article, that took me by surprise!

### Stupid examples, more like

Anonymous Penguin (not verified) - November 18, 2009 @ 6:49am

Smart untarring, indeed. "lfx xvf ~/testfile.bz2" will become "tar xvfj ~/testfile.bz2". Have a lot of fun with that.

Michael Vehrs

### a few remarks/additions

Johannes Truschnigg (not verified) - November 18, 2009 @ 8:12am

o) instead of parsing the output of \`ps\` with \`grep\`, use \`pgrep\`. It's installed on all GNU/Linux distributions carrying the procps tools (that should be all that don't target the embedded market).

o) Use ~/.ssh/config for configuring host-specific details (like a non-standard port).

o) GNU \`tar\` sports auto-detection for popular stream compressors (gzip, bzip2, lzma) - so just issuing \`tar xf somecompressedtarball.tar.xy\` should be enough to get its contents unpacked.

Have a nice day, and thanks for the article! :)

### Blocking ssh attempts can

Bas (not verified) - November 18, 2009 @ 12:20pm

Blocking ssh attempts can also be done by using iptables. You don't need to use exotic ports in this way.

The following lines create a rule that drops ssh login attempts from the same IP address after 3 failures and add a 5 minute barrier.

iptables -N SSHSCAN  
iptables -A INPUT -p tcp --dport 22 -s 192.168.1.2 -j ACCEPT  
iptables -A INPUT -p tcp --dport 22 -m state --state NEW -j SSHSCAN  
iptables -A SSHSCAN -m recent --set --name SSH  
iptables -A SSHSCAN -m recent --update --seconds 300 --hitcount 3 --name SSH -j LOG --log-level info --log-prefix "SSH SCAN blocked: "  
iptables -A SSHSCAN -m recent --update --seconds 300 --hitcount 3 --name SSH -j DROP

### Smart tar not needed

spiffytech (not verified) - November 18, 2009 @ 7:38pm

New versions of tar don't require the user to specify what compression type was used when uncompressing. \`tar -xvf\` is all you need.

### @Johannes Truschnigg: At

Muzer_cbatli (not verified) - November 18, 2009 @ 8:48pm

@Johannes Truschnigg: At your third point, I agree; I never understand why so few people realise it. It is so much simpler just to type tar -xvf filename rather than (angle brackets denote thought) tar -xv<argh, is it j or z, hmm, I'll have to go and check the file extension, argh, that means losing the command I've typed already>^H^H^H^H^H^H^Hls start\_of\_filename*

tar -xvjf filename

Far fewer keystrokes and thoughts :p

And I certainly wouldn't be able to remember to type lfx rather than tar...

### Great post!

PastMaster (not verified) - November 18, 2009 @ 11:06pm

Awesome tips! I am going to make it a point of using 1 or 2 everyday! :)

### Why use cat and less together?

Anonymous Penguin (not verified) - November 19, 2009 @ 6:28am

Just wondering about:  
cat /var/log/messages | less

When one can do this instead:  
less /var/log/messages

It seems to be common some how, I guess it doesn't matter much on modern machines, but I like to keep things simple.

I've noticed people piping cat to grep, when one could do this instead:

grep blah somefile.txt

This would search for blah, in somefile.txt

### impressive

Anonymous Penguin (not verified) - November 19, 2009 @ 9:38am

Very impressive piece, thank you very much for sharing.

### What do you have for ...?

BubbaT (not verified) - November 19, 2009 @ 5:23pm

\[ Just sitting here chilling listening to Vince Guaraldi's version of O Tennenbaum staring at the TuxRadar page when this thought occurred to me. \]  
...stupid geeks?

### cat less

Ash (not verified) - November 19, 2009 @ 11:03pm

\> I use cat/less like that all the time - usually I run cat, think "damn, the output is too long", then just tap Up on the keypad and add less to the end because it's faster that way.

Do you use Bash? Try

^cat^less

next time like this:

cat long.log  
^cat^less

But nothing against your habits, i do cat foo; damn; cat foo | less too :)

### ssh-copy-id fixed

Ash (not verified) - November 19, 2009 @ 11:07pm

\> Instead of adding the public key from the server's point of view...

$ cat ~/.ssh/id_rsa.pub | ssh remote.server.org "cat - >>~/.ssh  
/authorized_keys"

\> you could do it from your local host (client):

$ ssh-copy-id -i ~/.ssh/id_rsa remote.server.org

### smarter untarring

Ash (not verified) - November 19, 2009 @ 11:10pm

gnu tar:

tar xvf foo.tgz  
tar xvf foo.bz2  
etc.

Note: it does not do this magic when taring.

### rm * protect a directory

Lejoni (not verified) - November 21, 2009 @ 2:00am

You can protect the contents of a directory from "rm -f *" by creating a file in that directory named "-i"  
the as the * will get expanded to a list of the filenames and the last -flag overides any privious contradictionary flag.

### Indeed.

Dan Dart (not verified) - November 21, 2009 @ 1:41pm

ssh -D 3128 \[host\]  
set SOCKS proxy to localhost:3128 and you don't need a proxy server.

sudo -i  
mount --bind /dev /mnt/tmp/dev  
mount -t proc none /mnt/tmp/proc  
chroot /mnt/bin/bash

should be:

sudo -i  
mount --bind /dev /mnt/tmp/dev  
mount -t proc none /mnt/tmp/proc  
chroot /mnt/tmp/bin/bash

### chris@ubuntuos.com

Chris Lees (not verified) - November 23, 2009 @ 12:13pm

Thanks for these tips. I was a bit of a stupid geek - I wanted distro-agnostic IPC when I was writing a program and its GUI frontend, so I used files in /tmp to communicate. Now I know that I should have created a fifo instead. (yeah, I know about the existence of Dbus, but it's a lot of complexity considering the very simple information I needed to transfer).

...now I can create the 1,100th Mplayer frontend!

I seem to recall in an earlier Linux Format magazine, that you mocked people who did cat foo.txt | less; now it's coming back to haunt you!

### Perl Regex

Anonymous Penguin (not verified) - November 23, 2009 @ 2:40pm

To add _bak to the end of every file starting with file,I think the command should be  
prename 's/$/\\_bak/' file*  
rather than  
prename 's/\\_bak$//' file*

### Useless use of wc -l award!

Anonymous Penguin (not verified) - November 23, 2009 @ 6:50pm

You've managed to win a 'Useless use of wc -l'!

Rather than using 'grep foo | wc -l', it is recommended to use 'grep -c foo'.

### Smarter Untarring

Anonymous Penguin (not verified) - November 24, 2009 @ 4:14am

\`tar zxf somefile\` with a modern tar will untar it whether it's gzipped, bzip2ed, xz'd, or not compressed.

### Dangerous Aliases

Sidney (not verified) - November 24, 2009 @ 4:27pm

The "safe-delete command aliases" tip is a little bit scary.

Sure, on your box you will never be able to delete or move anything again without a second look, but what happens when you're on someone else's computer, forget that they're set up differently, and wipe out a whole directory of Important Stuff because you expected confirmation?

It's always a bad idea to override common commands with your own variants. Just alias to rmi, mvi, and cdi, and you'll be safe.

Also +1 for Elder-Geek's ssh tip. Config files are magical things.

### Actually, 'tar xf $file' has

Wicher Minnaard (not verified) - November 24, 2009 @ 5:58pm

Actually, 'tar xf $file' has been doing the right thing with GNU tar for a while now. The right thing being using gunzip if $file ends in .tgz or .tar.gz, etc.  
You can also run 'tar cf bla.tbz2 bling/' and it'll use bzip2 for compression.

### great

colo (not verified) - November 26, 2009 @ 5:43pm

Perfect work  
Great collection !

### Adjustments

Nick (not verified) - November 29, 2009 @ 4:17pm

First and foremost, great writeup!

Here's a couple things which should caught my attention:

The section titled, "Nice, nice baby" which covers the use of nice should be re-examined. Higher niceness values result in lower priority--a process w/ a niceness of -20 will share the highest priority, while a process w/ a niceness of 19 will share the lowest priority.

The section titled, "Killing time" cites:  
\> The larger the number, the more recent the process.  
This is not necessarily true. PIDs will eventually cycle, which means a more recent process can have a lower PID than an older one.

In the section titled, "Redirect the masses", consider adding the methods to redirect both, standard out and standard error, to the same file (at least in bash):  
foo 1>foo.log 2>&1 # The redirect order is important in this variant  
foo &> foo.log

### Orphans, not zombies

Captain Spang (not verified) - December 2, 2009 @ 6:35pm

Processes who have lost a parent are called orphans; zombies are processes who have ended (or died) but whose parent has not called wait() yet. Orphans get inherited by init and will eventually be removed.

### chroot is missing a parameter

Captain Spang (not verified) - December 2, 2009 @ 6:38pm

chroot needs a newroot dir:

chroot /mnt/tmp /mnt/bin/bash

### i was waiting to pounce on post 42

johnvile - December 2, 2009 @ 7:04pm

like an irresistible similitude warp. I missed it.

### sux and KDE applications

Drtic113 (not verified) - December 5, 2009 @ 10:23pm

Hi. Very good stuff.  
Just a note to sux. I had problem to run KDE applications with it (like "sux user konsole" etc.) because they need D-Bus running.  
This can be solved by "sux user dbus-launch konsole".

### @Lejoni

Jefferson (not verified) - January 11, 2010 @ 1:01pm

Hehe, nice one. Now, to remove the "-i" file, you can do this (from rm manual):

"To remove a file whose name starts with a ‘-’, for example ‘-foo’, use one of these commands:  
rm -- -foo  
rm ./-foo"

### I just LOVEd screen!

Elbriga (not verified) - January 20, 2010 @ 1:46am

screen rox!

I should have got to known it years ago!

Other magic of screen:

Ctrl+a then S(Shift+s) -> slip the screen horizontally  
Ctrl+a then | -> slip the screen vertically

Ctrl+a then TAB -> move between "windows"

Crtl+a then X -> Close window

### great work!

Anonymous Penguin (not verified) - April 5, 2010 @ 10:43pm

Awesome job man! I learnt shit loads :-) THanks

### Awesome tutorial. You might

hobsonlane - September 5, 2010 @ 6:35am

Awesome tutorial. You might want to fix that prename example, though. It should be:

prename 's/(\\w*)\\.\\w*)$/$1\\_bak$2/' file*

### awesome tutorial

vedette (not verified) - January 11, 2011 @ 5:44pm

You should have broken this up in parts and named it something like "The Best Command Line Tricks" and you would have gotten a whole bunch of people coming in. :P

In all seriousness though, great tips.

For disk maintenance, I recommend Parted Magic, got all the tools (testdisk, gparted, shredder, clonezilla) all on one disk. For ls colors (You probably know about it, but just in case), in your ~/.bashrc:

eval \`dircolors -b\`

About tar, it now recognizes file types so the -j|z switches aren't really necessary anymore. Just typing xvf (or xf if you don't need to see the output) will do.

### Old news - but sux sux

Me (not verified) - January 23, 2011 @ 11:23pm

I flew over half of this article, and I must say that most of this is old and boring news.

Anyway, apart from the 'tar' mistake pointed out above, I must mention that the last time I tried 'sux', it sucked badly. You should use 'su' and look into pam_xauth, instead.

### Shuf

Anonymous Penguin (not verified) - January 24, 2011 @ 4:00am

shuf has been misspelled at some points as shuff (I believe)

### ~/.ssh/config

DarwinSurvivor (not verified) - January 24, 2011 @ 5:34pm

Another advantage of ~/.ssh/config over ssh aliases is that the config file is also used for sshfs and scp as well as auto-complete (you can set up autocomplete to search the directories of remote computers, VERY useful when using scp).

**1**[2](/content/command-line-tricks-smart-geeks?page=1 "Go to page 2")[next ›](/content/command-line-tricks-smart-geeks?page=1 "Go to next page")[last »](/content/command-line-tricks-smart-geeks?page=1 "Go to last page")

Comment viewing options
-----------------------

Flat list - collapsedFlat list - expandedThreaded list - collapsedThreaded list - expanded

Date - newest firstDate - oldest first

10 comments per page30 comments per page50 comments per page70 comments per page90 comments per page150 comments per page200 comments per page250 comments per page300 comments per page

Select your preferred way to display the comments and click "Save settings" to activate your changes.
