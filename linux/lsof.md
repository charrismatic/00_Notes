```
What files are open?                       lsof
What process has a particular file open?   lsof /path/to/the/file
What files in some directory are open?     lsof +D /path/to/the/dir
What files does some user have open?       lsof -u username
What files do a group of users have open?  lsof -u user1,user2
What files are open by process name?       lsof -c procname
What files are open by PID?                lsof -p 123
What files are open by other PIDs?         lsof -p ^123
Show network activity                      lsof -i
What files are open by port?               lsof -i :25
                                           lsof -i :smtp
List PIDs                                  lsof -t
Show network activity for a user           lsof -a -u username -i
Show socket use                            lsof -U
Show NFS activity                          lsof -N


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

list what applications using what ports    lsof -i -T -n
```

      NAME       is the name of the mount point and file system on which the file resides;

                  or the name of a file specified in the names option (after any symbolic links have been resolved);

                  or the name of a character special or block special device;

                  or the local and remote Internet addresses of a network file; the local host name or IP number is followed by a colon (':'),  the  port,  ``->'',  and  the  two-part  remote
                  address;  IP  addresses  may  be  reported as numbers or names, depending on the +|-M, -n, and -P options; colon-separated IPv6 numbers are enclosed in square brackets; IPv4
                  INADDR_ANY and IPv6 IN6_IS_ADDR_UNSPECIFIED addresses, and zero port numbers are represented by an asterisk ('*'); a UDP destination address may be followed by the amount of
                  time  elapsed  since  the last packet was sent to the destination; TCP, UDP and UDPLITE remote addresses may be followed by TCP/TPI information in parentheses - state (e.g.,
                  ``(ESTABLISHED)'', ``(Unbound)''), queue sizes, and window sizes (not all dialects) - in a fashion similar to what netstat(1) reports; see the -T option description  or  the
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
       For a more extensive set of examples, documented more fully, see the 00QUICKSTART file of the lsof dis‐
       tribution.

       To list all open files, use:

              lsof

       To list all open Internet, x.25 (HP-UX), and UNIX domain files, use:

              lsof -i -U

       To list all open IPv4 network files in use by the process whose PID is 1234, use:

              lsof -i 4 -a -p 1234

       Presuming the UNIX dialect supports IPv6, to list only open IPv6 network files, use:

              lsof -i 6

       To list all files using any protocol on ports 513, 514, or 515 of host wonderland.cc.purdue.edu, use:

              lsof -i @wonderland.cc.purdue.edu:513-515

       To list all files using any protocol on any port of mace.cc.purdue.edu (cc.purdue.edu  is  the  default
       domain), use:

              lsof -i @mace

       To  list  all  open  files  for login name ``abe'', or user ID 1234, or process 456, or process 123, or  process 789, use:

              lsof -p 456,123,789 -u 1234,abe

       To list all open files on device /dev/hd4, use:

              lsof /dev/hd4

       To find the process that has /u/abe/foo open, use:

              lsof /u/abe/foo

       To send a SIGHUP to the processes that have /u/abe/bar open, use:

              kill -HUP `lsof -t /u/abe/bar`

       To find any open file, including an open UNIX domain socket file, with the name /dev/log, use:

              lsof /dev/log

       To find processes with open files on the NFS file system named /nfs/mount/point whose server  is  inac‐
       cessible, and presuming your mount table supplies the device number for /nfs/mount/point, use:

              lsof -b /nfs/mount/point

       To do the preceding search with warning messages suppressed, use:

              lsof -bw /nfs/mount/point

       To ignore the device cache file, use:

              lsof -Di

       To  obtain PID and command name field output for each process, file descriptor, file device number, and
       file inode number for each file of each process, use:

              lsof -FpcfDi

       To list the files at descriptors 1 and 3 of every process running the lsof command for login ID ``abe''
       every 10 seconds, use:

              lsof -c lsof -a -d 1 -d 3 -u abe -r10

       To  list  the  current working directory of processes running a command that is exactly four characters
       long and has an 'o' or 'O' in character three, use this regular expression form of the -c c option:

              lsof -c /^..o.$/i -a -d cwd

       To find an IP version 4 socket file by its associated numeric dot-form address, use:

              lsof -i@128.210.15.17

       To find an IP version 6 socket file (when the UNIX dialect supports IPv6)  by  its  associated  numeric
       colon-form address, use:

              lsof -i@[0:1:2:3:4:5:6:7]


       To  find  an  IP  version  6 socket file (when the UNIX dialect supports IPv6) by an associated numeric
       colon-form address that has a run of zeroes in it - e.g., the loop-back address - use:

              lsof -i@[::1]

       To obtain a repeat mode marker line that contains the current time, use:

              lsof -rm====%T====

       To add spaces to the previous marker line, use:

              lsof -r "m==== %T ===="










OUTPUT FOR OTHER PROGRAMS
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


