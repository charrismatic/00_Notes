
# LSOF  - LIST OPEN FILES 




## Helpful Shortcuts 


| QUERY                                     |            PARAMS            |
| ----------------------------------------- | ---------------------------- |
| What files are open?                      | lsof                         |
| What process has a particular file open?  | lsof /path/to/the/file       |
| What files in some directory are open?    | lsof +D /path/to/the/dir     |
| What files does some user have open?      | lsof -u username             |
| What files do a group of users have open? | lsof -u user1,user2          |
| What files are open by process name?      | lsof -c procname             |
| What files are open by PID?               | lsof -p 123                  |
| What files are open by other PIDs?        | lsof -p ^123                 |
| Show network activity                     | lsof -i                      |
| What files are open by port?              | lsof -i :25 || lsof -i :smtp |
| List PIDs                                 | lsof -t                      |
| Show network activity for a user          | lsof -a -u username -i       |
| Show socket use                           | lsof -U                      |
| Show NFS activity                         | lsof -N                      |
| list what applications using what ports   | lsof -i -T -n                |


## HELPFUL ALIASES 

Create a few aliases to avoid memorizing lsof's arcane syntax and options

```sh
alias shownet='sudo lsof -i'
alias showtcp='sudo lsof -i tcp'
alias showudp='sudo lsof -i udp'
alias byuser='sudo lsof -u'
alias bypid='sudo lsof -p'
alias byfile='sudo lsof'
alias byprogram='sudo lsof -c'
alias showfiles='sudo lsof'
alias showmyfiles='sudo lsof -u `whoami`'
alias ofiles='sudo lsof -u `whoami`'
alias showmyopenfiles='sudo lsof -u `whoami`'
alias showmine='sudo lsof -u `whoami`'
```


NAME         is the name of the mount point and file system on which the file resides;
    
    or the name of a file specified in the names option (after any symbolic links have been resolved)

or the name of a character special or block special device;

or the local and remote Internet addresses of a network file;
the local host name or IP number is followed by a colon (':'),  the  port,  ``->'',  and  the  two-part  remote address;
IP  addresses  may  be  reported as numbers or names, depending on the +|-M, -n, and -P options;
colon-separated IPv6 numbers are enclosed in square brackets;

IPv4 INADDR_ANY and IPv6 IN6_IS_ADDR_UNSPECIFIED addresses, and zero port numbers are represented by an asterisk ('*');
a UDP destination address may be followed by the amount of
time  elapsed  since  the last packet was sent to the destination;
TCP, UDP and UDPLITE remote addresses may be followed by TCP/TPI information in parentheses - state (e.g.,
``(ESTABLISHED)'', ``(Unbound)''), queue sizes, and window sizes (not all dialects) - in a fashion similar to what netstat(1) reports;
see the -T option description  or  the
description of the TCP/TPI field in OUTPUT FOR OTHER PROGRAMS for more information on state, queue size, and window size;


or  the  address or name of a UNIX domain socket, possibly including a stream clone device name, a file system object's path name, local and foreign kernel addresses, socket
pair information, and a bound vnode address;


or the local and remote mount point names of an NFS file;


or ``STR'', followed by the stream name;

or a stream character device name, followed by ``->'' and the stream name or a list of stream module names, separated by ``->'';

or ``STR:'' followed by the SCO OpenServer stream device and module names, separated by ``->'';

or system directory name, `` -- '', and as many components of the path name as lsof can find in the kernel's name cache for selected dialects (See the KERNEL NAME CACHE sec‐
tion for more information.);

or ``PIPE->'', followed by a Solaris kernel pipe destination address;

or ``COMMON:'', followed by the vnode device information structure's device name, for a Solaris common vnode;

or the address family, followed by a slash (`/'), followed by fourteen comma-separated bytes of a non-Internet raw socket address;

or the HP-UX x.25 local address, followed by the virtual connection number (if any), followed by the remote address (if any);

or ``(dead)'' for disassociated Tru64 UNIX files - typically terminal files that have been flagged with the TIOCNOTTY ioctl and closed by daemons;

or ``rd=<offset>'' and ``wr=<offset>'' for the values of the read and write offsets of a FIFO;

or ``clone n:/dev/event'' for SCO OpenServer file clones of the /dev/event device, where n is the minor device number of the file;

or ``(socketpair: n)'' for a Solaris 2.6, 8, 9  or 10 UNIX domain socket, created by the socketpair(3N) network function;

or  ``no PCB'' for socket files that do not have a protocol block associated with them, optionally followed by ``, CANTSENDMORE'' if sending on the socket has been disabled,
or ``, CANTRCVMORE'' if receiving on the socket has been disabled (e.g., by the shutdown(2) function);

or the local and remote addresses of a Linux IPX socket file in the form <net>:[<node>:]<port>, followed in parentheses by the transmit and receive queue sizes, and the con‐
nection state;

or ``dgram'' or ``stream'' for the type UnixWare 7.1.1 and above in-kernel UNIX domain sockets, followed by a colon (':') and the local path name when available, followed by
``->'' and the remote path name or kernel socket address in hexadecimal when available;

or the association value, association index, endpoint value, local address, local port, remote address and remote port for Linux SCTP sockets;

or ``protocol: '' followed by the Linux socket's protocol attribute.





EXAMPLES
For a more extensive set of examples, documented more fully, see the 00QUICKSTART file of the lsof distribution.

list all open files, use:                                                                                             lsof

list all open Internet, x.25 (HP-UX), and UNIX domain files:                                                          lsof -i -U

list all open IPv4 network files in use by the process whose PID is 1234,                                             lsof -i 4 -a -p 1234

Presuming the UNIX dialect supports IPv6, to list only open IPv6 network files, use:                                 lsof -i 6

ist all files using any protocol on ports 513, 514, or 515 of                                                         lsof -i @wonderland.cc.purdue.edu:513-515
host wonderland.cc.purdue.edu, use:                                                           

To list all files using any protocol on any port of mace.cc.purdue.edu (cc.purdue.edu  is  the  default
domain), use:                                                                                                        lsof -i @mace

To  list  all  open  files  for login name ``abe'', or user ID 1234, or process 456, or process 123, or  process 789, use:                                                          lsof -p 456,123,789 -u 1234,abe

To list all open files on device /dev/hd4, use:                                                           lsof /dev/hd4

To find the process that has /u/abe/foo open, use:                                                          lsof /u/abe/foo

To send a SIGHUP to the processes that have /u/abe/bar open, use:                                                           kill -HUP `lsof -t /u/abe/bar`

To find any open file, including an open UNIX domain socket file, with the name /dev/log, use:                                                          lsof /dev/log

To find processes with open files on the NFS file system named /nfs/mount/point whose server  is  inac‐
cessible, and presuming your mount table supplies the device number for /nfs/mount/point, use:                                                          lsof -b /nfs/mount/point

To do the preceding search with warning messages suppressed, use:                                                           lsof -bw /nfs/mount/point

To ignore the device cache file, use:                                                           lsof -Di

To  obtain PID and command name field output for each process, file descriptor, file device number, and
file inode number for each file of each process, use:                                                           lsof -FpcfDi

To list the files at descriptors 1 and 3 of every process running the lsof command for login ID ``abe''
every 10 seconds, use:                                                          lsof -c lsof -a -d 1 -d 3 -u abe -r10

To  list  the  current working directory of processes running a command that is exactly four characters
long and has an 'o' or 'O' in character three, use this regular expression form of the -c c option:                                                           lsof -c /^..o.$/i -a -d cwd

To find an IP version 4 socket file by its associated numeric dot-form address, use:                                                          lsof -i@128.210.15.17

To find an IP version 6 socket file (when the UNIX dialect supports IPv6)  by  its  associated  numeric
colon-form address, use:                                                          lsof -i@[0:1:2:3:4:5:6:7]


To  find  an  IP  version  6 socket file (when the UNIX dialect supports IPv6) by an associated numeric
colon-form address that has a run of zeroes in it - e.g., the loop-back address - use:                                                          lsof -i@[::1]

To obtain a repeat mode marker line that contains the current time, use:                                                          lsof -rm====%T====

To add spaces to the previous marker line, use:                                                           lsof -r "m==== %T ===="










## OUTPUT FOR OTHER PROGRAMS

       When the -F option is specified, lsof produces output that is suitable for processing by another program - e.g, an awk or Perl script, or a C program.

Each unit of information is output in a field that is identified with a leading character and terminated by a NL (012) (or a NUL (000) if the 0 (zero)  field  identifier  character  is
specified.)  The data of the field follows immediately after the field identification character and extends to the field terminator.

It  is  possible to think of field output as process and file sets.  A process set begins with a field whose identifier is `p' (for process IDentifier (PID)).  It extends to the begin‐
ning of the next PID field or the beginning of the first file set of the process, whichever comes first.  Included in the process set are fields that identify the command, the  process
group IDentification (PGID) number, the task (thread) ID (TID), and the user ID (UID) number or login name.

A  file  set  begins  with a field whose identifier is `f' (for file descriptor).  It is followed by lines that describe the file's access mode, lock state, type, device, size, offset,
inode, protocol, name and stream module names.  It extends to the beginning of the next file or process set, whichever comes first.

When the NUL (000) field terminator has been selected with the 0 (zero) field identifier character, lsof ends each process and file set with a NL (012) character.

Lsof always produces one field, the PID (`p') field.  All other fields may be declared optionally in the field identifier character list that follows  the  -F  option.   When  a  field
selection  character  identifies an item lsof does not normally list - e.g., PPID, selected with -R - specification of the field character - e.g., ``-FR'' - also selects the listing of
the item.

It is entirely possible to select a set of fields that cannot easily be parsed - e.g., if the field descriptor field is not selected, it may be difficult to  identify  file  sets.   To
help you avoid this difficulty, lsof supports the -F option; it selects the output of all fields with NL terminators (the -F0 option pair selects the output of all fields with NUL ter‐
minators).  For compatibility reasons neither -F nor -F0 select the raw device field.
These are the fields that lsof will produce.  The single character listed first is the field identifier.
    
```    
            a    file access mode
            c    process command name (all characters from proc or
                 user structure)
            C    file structure share count
            d    file's device character code
            D    file's major/minor device number (0x<hexadecimal>)
            f    file descriptor (always selected)
            F    file structure address (0x<hexadecimal>)
            G    file flaGs (0x<hexadecimal>; names if +fg follows)
            g    process group ID
            i    file's inode number
            K    tasK ID
            k    link count
            l    file's lock status
            L    process login name
            m    marker between repeated output
            n    file name, comment, Internet address
            N    node identifier (ox<hexadecimal>
            o    file's offset (decimal)
            p    process ID (always selected)
            P    protocol name
            r    raw device number (0x<hexadecimal>)
            R    parent process ID
            s    file's size (decimal)
            S    file's stream identification
            t    file's type
            T    TCP/TPI information, identified by prefixes (the
                 `=' is part of the prefix):
                     QR=<read queue size>
                     QS=<send queue size>
                     SO=<socket options and values> (not all dialects)
                     SS=<socket states> (not all dialects)
                     ST=<connection state>
                     TF=<TCP flags and values> (not all dialects)
                     WR=<window read size>  (not all dialects)
                     WW=<window write size>  (not all dialects)
                 (TCP/TPI information isn't reported for all supported
                   UNIX dialects. The -h or -? help output for the
                   -T option will show what TCP/TPI reporting can be
                   requested.)
            u    process user ID
            z    Solaris 10 and higher zone name
            Z    SELinux security context (inhibited when SELinux is disabled)
            0    use NUL field terminator character in place of NL
            1-9  dialect-specific field identifiers (The output
                 of -F? identifies the information to be found
                 in dialect-specific fields.)
```

You can get on-line help information on these characters and their descriptions by specifying the -F?  option pair.  (Escape the `?' character  as  your  shell  requires.)   Additional
information on field content can be found in the OUTPUT section.

As  an  example,  ``-F pcfn'' will select the process ID (`p'), command name (`c'), file descriptor (`f') and file name (`n') fields with an NL field terminator character; ``-F pcfn0''
selects the same output with a NUL (000) field terminator character.

Lsof doesn't produce all fields for every process or file set, only those that are available.  Some fields are mutually exclusive: file device characters and  file  major/minor  device
numbers;  file inode number and protocol name; file name and stream identification; file size and offset.  One or the other member of these mutually exclusive sets will appear in field
output, but not both.

Normally lsof ends each field with a NL (012) character.  The 0 (zero) field identifier character may be specified to change the field terminator character to a NUL (000).  A NUL  ter‐
minator  may be easier to process with xargs (1), for example, or with programs whose quoting mechanisms may not easily cope with the range of characters in the field output.  When the
NUL field terminator is in use, lsof ends each process and file set with a NL (012).

Three aids to producing programs that can process lsof field output are included in the lsof distribution.  The first is a C header file, lsof_fields.h, that contains symbols  for  the
field identification characters, indexes for storing them in a table, and explanation strings that may be compiled into programs.  Lsof uses this header file.

The second aid is a set of sample scripts that process field output, written in awk, Perl 4, and Perl 5.  They're located in the scripts subdirectory of the lsof distribution.

The  third aid is the C library used for the lsof test suite.  The test suite is written in C and uses field output to validate the correct operation of lsof.  The library can be found
in the tests/LTlib.c file of the lsof distribution.  The library uses the first aid, the lsof_fields.h header file.


lsof - list open files

# http://www.thegeekstuff.com/2012/08/lsof-command-examples

1. Introduction to lsof

Simply typing lsof will provide a list of all open files belonging to all active processes.

# lsof

COMMAND  PID       USER   FD      TYPE     DEVICE  SIZE/OFF       NODE NAME
init       1       root  cwd       DIR        8,1      4096          2 /
init       1       root  txt       REG        8,1    124704     917562 /sbin/init
init       1       root    0u      CHR        1,3       0t0       4369 /dev/null
init       1       root    1u      CHR        1,3       0t0       4369 /dev/null
init       1       root    2u      CHR        1,3       0t0       4369 /dev/null
init       1       root    3r     FIFO        0,8       0t0       6323 pipe
...
By default One file per line is displayed. Most of the columns are self explanatory. We will explain the details about couple of cryptic columns (FD and TYPE).

FD – Represents the file descriptor. Some of the values of FDs are,

cwd – Current Working Directory
txt – Text file
mem – Memory mapped file
mmap – Memory mapped device
NUMBER – Represent the actual file descriptor. The character after the number i.e ‘1u’, represents the mode in which the file is opened. r for read, w for write, u for read and write.
TYPE – Specifies the type of the file. Some of the values of TYPEs are,

REG – Regular File
DIR – Directory
FIFO – First In First Out
CHR – Character special file
For a complete list of FD & TYPE, refer man lsof.

2. List processes which opened a specific file

You can list only the processes which opened a specific file, by providing the filename as arguments.

# lsof /var/log/syslog

COMMAND  PID   USER   FD   TYPE DEVICE SIZE/OFF   NODE NAME
rsyslogd 488 syslog    1w   REG    8,1     1151 268940 /var/log/syslog
3. List opened files under a directory

You can list the processes which opened files under a specified directory using ‘+D’ option. +D will recurse the sub directories also. If you don’t want lsof to recurse, then use ‘+d’ option.

# lsof +D /var/log/

COMMAND   PID   USER  FD   TYPE DEVICE SIZE/OFF   NODE NAME
rsyslogd  488 syslog   1w   REG    8,1     1151 268940 /var/log/syslog
rsyslogd  488 syslog   2w   REG    8,1     2405 269616 /var/log/auth.log
console-k 144   root   9w   REG    8,1    10871 269369 /var/log/ConsoleKit/history
4. List opened files based on process names starting with

You can list the files opened by process names starting with a string, using ‘-c’ option. -c followed by the process name will list the files opened by the process starting with that processes name. You can give multiple -c switch on a single command line.

# lsof -c ssh -c init

COMMAND    PID   USER   FD   TYPE DEVICE SIZE/OFF   NODE NAME
init         1       root  txt    REG        8,1   124704  917562 /sbin/init
init         1       root  mem    REG        8,1  1434180 1442625 /lib/i386-linux-gnu/libc-2.13.so
init         1       root  mem    REG        8,1    30684 1442694 /lib/i386-linux-gnu/librt-2.13.so
...
ssh-agent 1528 lakshmanan    1u   CHR        1,3      0t0    4369 /dev/null
ssh-agent 1528 lakshmanan    2u   CHR        1,3      0t0    4369 /dev/null
ssh-agent 1528 lakshmanan    3u  unix 0xdf70e240      0t0   10464 /tmp/ssh-sUymKXxw1495/agent.1495
5. List processes using a mount point

Sometime when we try to umount a directory, the system will say “Device or Resource Busy” error. So we need to find out what are all the processes using the mount point and kill those processes to umount the directory. By using lsof we can find those processes.

# lsof /home
The following will also work.

# lsof +D /home/
6. List files opened by a specific user

In order to find the list of files opened by a specific users, use ‘-u’ option.

# lsof -u lakshmanan

COMMAND    PID       USER   FD   TYPE     DEVICE SIZE/OFF       NODE NAME
update-no 1892 lakshmanan   20r  FIFO        0,8      0t0      14536 pipe
update-no 1892 lakshmanan   21w  FIFO        0,8      0t0      14536 pipe
bash      1995 lakshmanan  cwd    DIR        8,1     4096     393218 /home/lakshmanan
Sometimes you may want to list files opened by all users, expect some 1 or 2. In that case you can use the ‘^’ to exclude only the particular user as follows

# lsof -u ^lakshmanan

COMMAND    PID       USER   FD      TYPE     DEVICE  SIZE/OFF       NODE NAME
rtkit-dae 1380      rtkit    7u     0000        0,9         0       4360 anon_inode
udisks-da 1584       root  cwd       DIR        8,1      4096          2 /
The above command listed all the files opened by all users, expect user ‘lakshmanan’.

7. List all open files by a specific process

You can list all the files opened by a specific process using ‘-p’ option. It will be helpful sometimes to get more information about a specific process.

# lsof -p 1753

COMMAND  PID       USER   FD   TYPE DEVICE SIZE/OFF    NODE NAME
bash    1753 lakshmanan  cwd    DIR    8,1     4096  393571 /home/lakshmanan/test.txt
bash    1753 lakshmanan  rtd    DIR    8,1     4096       2 /
bash    1753 lakshmanan  255u   CHR  136,0      0t0       3 /dev/pts/0
...
8. Kill all process that belongs to a particular user

When you want to kill all the processes which has files opened by a specific user, you can use ‘-t’ option to list output only the process id of the process, and pass it to kill as follows

# kill -9 `lsof -t -u lakshmanan`
The above command will kill all process belonging to user ‘lakshmanan’, which has files opened.

Similarly you can also use ‘-t’ in many ways. For example, to list process id of a process which opened /var/log/syslog can be done by

# lsof -t /var/log/syslog

489
Talking about kill, did you know that there are 4 Ways to Kill a Process?

9. Combine more list options using OR/AND

By default when you use more than one list option in lsof, they will be ORed. For example,

# lsof -u lakshmanan -c init

COMMAND    PID       USER   FD   TYPE     DEVICE SIZE/OFF       NODE NAME
init         1       root  cwd    DIR        8,1     4096          2 /
init         1       root  txt    REG        8,1   124704     917562 /sbin/init
bash      1995 lakshmanan    2u   CHR      136,2      0t0          5 /dev/pts/2
bash      1995 lakshmanan  255u   CHR      136,2      0t0          5 /dev/pts/2
...
The above command uses two list options, ‘-u’ and ‘-c’. So the command will list process belongs to user ‘lakshmanan’ as well as process name starts with ‘init’.

But when you want to list a process belongs to user ‘lakshmanan’ and the process name starts with ‘init’, you can use ‘-a’ option.

# lsof -u lakshmanan -c init -a
The above command will not output anything, because there is no such process named ‘init’ belonging to user ‘lakshmanan’.

10. Execute lsof in repeat mode

lsof also support Repeat mode. It will first list files based on the given parameters, and delay for specified seconds and again list files based on the given parameters. It can be interrupted by a signal.

Repeat mode can be enabled by using ‘-r’ or ‘+r’. If ‘+r’ is used then, the repeat mode will end when no open files are found. ‘-r’ will continue to list,delay,list until a interrupt is given irrespective of files are opened or not.

Each cycle output will be separated by using ‘=======’. You also also specify the time delay as ‘-r’ | ‘+r’.

# lsof -u lakshmanan -c init -a -r5

=======
=======
COMMAND   PID       USER   FD   TYPE DEVICE SIZE/OFF    NODE NAME
inita.sh 2971 lakshmanan  cwd    DIR    8,1     4096  393218 /home/lakshmanan
inita.sh 2971 lakshmanan  rtd    DIR    8,1     4096       2 /
inita.sh 2971 lakshmanan  txt    REG    8,1    83848  524315 /bin/dash
inita.sh 2971 lakshmanan  mem    REG    8,1  1434180 1442625 /lib/i386-linux-gnu/libc-2.13.so
inita.sh 2971 lakshmanan  mem    REG    8,1   117960 1442612 /lib/i386-linux-gnu/ld-2.13.so
inita.sh 2971 lakshmanan    0u   CHR  136,4      0t0       7 /dev/pts/4
inita.sh 2971 lakshmanan    1u   CHR  136,4      0t0       7 /dev/pts/4
inita.sh 2971 lakshmanan    2u   CHR  136,4      0t0       7 /dev/pts/4
inita.sh 2971 lakshmanan   10r   REG    8,1       20  393578 /home/lakshmanan/inita.sh
=======
In the above output, for the first 5 seconds, there is no output. After that a script named “inita.sh” is started, and it list the output.

Finding Network Connection

Network connections are also files. So we can find information about them by using lsof.

11. List all network connections

You can list all the network connections opened by using ‘-i’ option.

# lsof -i

COMMAND    PID  USER   FD   TYPE DEVICE SIZE/OFF NODE NAME
avahi-dae  515 avahi   13u  IPv4   6848      0t0  UDP *:mdns
avahi-dae  515 avahi   16u  IPv6   6851      0t0  UDP *:52060
cupsd     1075  root    5u  IPv6  22512      0t0  TCP ip6-localhost:ipp (LISTEN)
You can also use ‘-i4’ or ‘-i6’ to list only ‘IPV4’ or ‘IPV6‘ respectively.

12. List all network files in use by a specific process

You can list all the network files which is being used by a process as follows

# lsof -i -a -p 234
You can also use the following

# lsof -i -a -c ssh
The above command will list the network files opened by the processes starting with ssh.

13. List processes which are listening on a particular port

You can list the processes which are listening on a particular port by using ‘-i’ with ‘:’ as follows

# lsof -i :25

COMMAND  PID        USER   FD   TYPE DEVICE SIZE NODE NAME
exim4   2541 Debian-exim    3u  IPv4   8677       TCP localhost:smtp (LISTEN)
14. List all TCP or UDP connections

You can list all the TCP or UDP connections by specifying the protocol using ‘-i’.

# lsof -i tcp; lsof -i udp;
15. List all Network File System ( NFS ) files

You can list all the NFS files by using ‘-N’ option. The following lsof command will list all NFS files used by user ‘lakshmanan’.

# lsof -N -u lakshmanan -a