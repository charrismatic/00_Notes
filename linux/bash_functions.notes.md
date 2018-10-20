http://www.thegeekstuff.com/2010/04/unix-bash-function-examples/

http://www.thegeekstuff.com/2010/03/introduction-to-bash-scripting/
http://www.thegeekstuff.com/2010/03/bash-shell-exit-status/
http://www.thegeekstuff.com/2010/04/unix-bash-alias-examples/
http://www.thegeekstuff.com/2008/10/execution-sequence-for-bash_profile-bashrc-bash_login-profile-and-bash_logout/


Syntax to create a bash function:

function functionname()
{
commands
.
.
}

You can call the bash function from the command line as shown below:
$ functionname arg1 arg2

When shell interprets a Linux command, it first looks into the special built-in functions like break, continue, eval, exec etc., then it looks for shell functions. The exit status of the bash function is the exit status of the last command executed in the function body.


###########################################################################
Example 1: Function to display long list of files with the given extension

The function “lsext” is used to find the list of files in the current directory, 
which has the given extension as shown below. This function uses the combination
of find command and ls command to get the job don
http://www.thegeekstuff.com/2009/03/15-practical-linux-find-command-examples/
http://www.thegeekstuff.com/2009/07/linux-ls-command-examples/

$ function lsext()
{
   find . -type f -iname '*.'${1}'' -exec ls -l {} \; ;
}

$ cd ~
$ lsext txt
-rw-r--r-- 1 root root   24 Dec 15 14:00 InMorning.txt
-rw-r--r-- 1 root root  184 Dec 16 11:45 Changes16.txt
-rw-r--r-- 1 root root  458 Dec 18 11:04 Changes18.txt
-rw-r--r-- 1 root root 1821 Feb  4 15:01 ChangesOfDB.txt

#############################################################################
Example 2. Bash Function to execute a given Linux command on a group of files

In the following example, function “batchexec” finds the files with the given
extension and executes the given command on those selected files.

$ function batchexec()
{
  find . -type f -iname '*.'${1}'' -exec ${@:2}  {} \; ;
}

$ cd ~

$ batchexec sh ls
$ batchexec sh chmod 755
$ ls -l *.sh
-rwxr-xr-x 1 root root  144 Mar  9 14:39 debug.sh
-rwxr-xr-x 1 root root 5431 Jan 25 11:32 get_opc_vers.sh
-rwxr-xr-x 1 root root   22 Mar 18 08:32 t.sh

In the above example, it finds all the shell script files with the .sh extension, and changes its permission to 755. (All permission for user, for group and others read and execute permission). In the function definition you could notice “${@:2}” which gives the second and following positional parameters (shell expansion feature).



#################################################################################
Example 3. Bash Function to generate random password
$ function rpass() {
  cat /dev/urandom | tr -cd '[:graph:]' | head -c ${1:-12}
}

$ rpass 6
-Ju.T[[

$ rpass
Gz1f!aKN^""k




##################################################################################
Example 4. Bash function to get IP address of a given interface
$function getip()
{
	/sbin/ifconfig ${1:-eth0} | awk '/inet addr/ {print $2}' | awk -F: '{print $2}';
}

$ getip
15.110.106.86
$ getip eth0
15.110.106.86
$ getip lo
127.0.0.1



#################################################################################
Example 5. Bash function to print the machines details

This example defines the function which gives all the required information about 
he machine. Users can define and call this function in the start up files, so 
that you will get these information during startup.

$ function mach()
{
    echo -e "\nMachine information:" ; uname -a
    echo -e "\nUsers logged on:" ; w -h
    echo -e "\nCurrent date :" ; date
    echo -e "\nMachine status :" ; uptime
    echo -e "\nMemory status :" ; free
    echo -e "\nFilesystem status :"; df -h
}

$ mach
Machine information:
Linux dev-db 2.6.18-128.el5 #1 SMP Wed Dec 17 11:41:38 EST 2008 x86_64 GNU/Linux

Users logged on:
root     pts/2    ptal.mot Wed10    0.00s  1.35s  0.01s w -h

Current date :
Thu Mar 18 11:59:36 CET 2010

Machine status :
 11:59:36 up 7 days, 3 min,  1 user,  load average: 0.01, 0.15, 0.15

Memory status :
             total       used       free     shared    buffers     cached
Mem:       2059768    2033212      26556          0      81912     797560
-/+ buffers/cache:    1153740     906028
Swap:      4192956      48164    4144792

Filesystem status :
Filesystem            Size  Used Avail Use% Mounted on
/dev/sda1              12G   12G     0 100% /
tmpfs                1006M  377M  629M  38% /dev/shm
/dev/sdc5             9.9G  409M  9.0G   5% /mydisk




############################################################
Display the function code using type command

type is a shell built-in used to view the function code.

Syntax:
type function-name

$ type ll
ll is a function
ll ()
{
    clear;
    tput cup 0 0;
    ls --color=auto -F --color=always -lhFrt;
    tput cup 40 0;
    alias ls="ls --color=auto -F"
}
