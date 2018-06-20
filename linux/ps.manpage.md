EXAMPLES
       To see every process on the system using standard syntax:
          ps -e
          ps -ef
          ps -eF
          ps -ely

       To see every process on the system using BSD syntax:
          ps ax
          ps axu

       To print a process tree:
          ps -ejH
          ps axjf

       To get info about threads:
          ps -eLf
          ps axms

       To get security info:
          ps -eo euser,ruser,suser,fuser,f,comm,label
          ps axZ
          ps -eM

       To see every process running as root (real & effective ID) in user format:
          ps -U root -u root u

       To see every process with a user-defined format:
          ps -eo pid,tid,class,rtprio,ni,pri,psr,pcpu,stat,wchan:14,comm
          ps axo stat,euid,ruid,tty,tpgid,sess,pgrp,ppid,pid,pcpu,comm
          ps -Ao pid,tt,user,fname,tmout,f,wchan

       Print only the process IDs of syslogd:
          ps -C syslogd -o pid=

       Print only the name of PID 42:
          ps -q 42 -o comm=





SIMPLE PROCESS SELECTION
       a      Lift the BSD-style "only yourself" restriction, which is imposed upon the set of all processes when some BSD-style (without "-") options are used
              or when the ps personality setting is BSD-like.  The set of processes selected in this manner is in addition to the set of processes selected by
              other means.  An alternate description is that this option causes ps to list all processes with a terminal (tty), or to list all processes when
              used together with the x option.

       -A     Select all processes.  Identical to -e.

       -a     Select all processes except both session leaders (see getsid(2)) and processes not associated with a terminal.

       -d     Select all processes except session leaders.

       --deselect
              Select all processes except those that fulfill the specified conditions (negates the selection).  Identical to -N.

       -e     Select all processes.  Identical to -A.

       g      Really all, even session leaders.  This flag is obsolete and may be discontinued in a future release.  It is normally implied by the a flag, and is
              only useful when operating in the sunos4 personality.

       -N     Select all processes except those that fulfill the specified conditions (negates the selection).  Identical to --deselect.

       T      Select all processes associated with this terminal.  Identical to the t option without any argument.

       r      Restrict the selection to only running processes.

       x      Lift the BSD-style "must have a tty" restriction, which is imposed upon the set of all processes when some BSD-style (without "-") options are used
              or when the ps personality setting is BSD-like.  The set of processes selected in this manner is in addition to the set of processes selected by
              other means.  An alternate description is that this option causes ps to list all processes owned by you (same EUID as ps), or to list all processes
              when used together with the a option.









PROCESS SELECTION BY LIST
       These options accept a single argument in the form of a blank-separated or comma-separated list.  They can be used multiple times.  For example:
       ps -p "1 2" -p 3,4

       -123   Identical to --pid 123.

       123    Identical to --pid 123.

       -C cmdlist
              Select by command name.  This selects the processes whose executable name is given in cmdlist.

       -G grplist
              Select by real group ID (RGID) or name.  This selects the processes whose real group name or ID is in the grplist list.  The real group ID
              identifies the group of the user who created the process, see getgid(2).

       -g grplist
              Select by session OR by effective group name.  Selection by session is specified by many standards, but selection by effective group is the logical
              behavior that several other operating systems use.  This ps will select by session when the list is completely numeric (as sessions are).  Group ID
              numbers will work only when some group names are also specified.  See the -s and --group options.

       --Group grplist
              Select by real group ID (RGID) or name.  Identical to -G.

       --group grplist
              Select by effective group ID (EGID) or name.  This selects the processes whose effective group name or ID is in grplist.  The effective group ID
              describes the group whose file access permissions are used by the process (see getegid(2)).  The -g option is often an alternative to --group.

       p pidlist
              Select by process ID.  Identical to -p and --pid.

       -p pidlist
              Select by PID.  This selects the processes whose process ID numbers appear in pidlist.  Identical to p and --pid.

       --pid pidlist
              Select by process ID.  Identical to -p and p.

       --ppid pidlist
              Select by parent process ID.  This selects the processes with a parent process ID in pidlist.  That is, it selects processes that are children of
              those listed in pidlist.

       q pidlist
              Select by process ID (quick mode).  Identical to -q and --quick-pid.

       -q pidlist
              Select by PID (quick mode).  This selects the processes whose process ID numbers appear in pidlist.  With this option ps reads the necessary info
              only for the pids listed in the pidlist and doesn't apply additional filtering rules. The order of pids is unsorted and preserved. No additional
              selection options, sorting and forest type listings are allowed in this mode.  Identical to q and --quick-pid.

       --quick-pid pidlist
              Select by process ID (quick mode).  Identical to -q and q.

       -s sesslist
              Select by session ID.  This selects the processes with a session ID specified in sesslist.


       --sid sesslist
              Select by session ID.  Identical to -s.

       t ttylist
              Select by tty.  Nearly identical to -t and --tty, but can also be used with an empty ttylist to indicate the terminal associated with ps.  Using
              the T option is considered cleaner than using t with an empty ttylist.

       -t ttylist
              Select by tty.  This selects the processes associated with the terminals given in ttylist.  Terminals (ttys, or screens for text output) can be
              specified in several forms: /dev/ttyS1, ttyS1, S1.  A plain "-" may be used to select processes not attached to any terminal.

       --tty ttylist
              Select by terminal.  Identical to -t and t.

       U userlist
              Select by effective user ID (EUID) or name.  This selects the processes whose effective user name or ID is in userlist.  The effective user ID
              describes the user whose file access permissions are used by the process (see geteuid(2)).  Identical to -u and --user.

       -U userlist
              Select by real user ID (RUID) or name.  It selects the processes whose real user name or ID is in the userlist list.  The real user ID identifies
              the user who created the process, see getuid(2).

       -u userlist
              Select by effective user ID (EUID) or name.  This selects the processes whose effective user name or ID is in userlist.

              The effective user ID describes the user whose file access permissions are used by the process (see geteuid(2)).  Identical to U and --user.

       --User userlist
              Select by real user ID (RUID) or name.  Identical to -U.

       --user userlist
              Select by effective user ID (EUID) or name.  Identical to -u and U.






OUTPUT FORMAT CONTROL
       These options are used to choose the information displayed by ps.  The output may differ by personality.

       -c     Show different scheduler information for the -l option.

       --context
              Display security context format (for SELinux).

       -f     Do full-format listing. This option can be combined with many other UNIX-style options to add additional columns.  It also causes the command
              arguments to be printed.  When used with -L, the NLWP (number of threads) and LWP (thread ID) columns will be added.  See the c option, the format
              keyword args, and the format keyword comm.

       -F     Extra full format.  See the -f option, which -F implies.

       --format format
              user-defined format.  Identical to -o and o.

       j      BSD job control format.

       -j     Jobs format.

       l      Display BSD long format.

       -l     Long format.  The -y option is often useful with this.

       -M     Add a column of security data.  Identical to Z (for SELinux).

       O format
              is preloaded o (overloaded).  The BSD O option can act like -O (user-defined output format with some common fields predefined) or can be used to
              specify sort order.  Heuristics are used to determine the behavior of this option.  To ensure that the desired behavior is obtained (sorting or
              formatting), specify the option in some other way (e.g.  with -O or --sort).  When used as a formatting option, it is identical to -O, with the BSD
              personality.

       -O format
              Like -o, but preloaded with some default columns.  Identical to -o pid,format,state,tname,time,command or -o pid,format,tname,time,cmd, see -o
              below.

       o format
              Specify user-defined format.  Identical to -o and --format.

       -o format
              User-defined format.  format is a single argument in the form of a blank-separated or comma-separated list, which offers a way to specify
              individual output columns.  The recognized keywords are described in the STANDARD FORMAT SPECIFIERS section below.  Headers may be renamed (ps -o
              pid,ruser=RealUser -o comm=Command) as desired.  If all column headers are empty (ps -o pid= -o comm=) then the header line will not be output.
              Column width will increase as needed for wide headers; this may be used to widen up columns such as WCHAN (ps -o pid,wchan=WIDE-WCHAN-COLUMN -o
              comm).  Explicit width control (ps opid,wchan:42,cmd) is offered too.  The behavior of ps -o pid=X,comm=Y varies with personality; output may be
              one column named "X,comm=Y" or two columns named "X" and "Y".  Use multiple -o options when in doubt.  Use the PS_FORMAT environment variable to
              specify a default as desired; DefSysV and DefBSD are macros that may be used to choose the default UNIX or BSD columns.

       s      Display signal format.

       u      Display user-oriented format.

       v      Display virtual memory format.

       X      Register format.

       -y     Do not show flags; show rss in place of addr.  This option can only be used with -l.

       Z      Add a column of security data.  Identical to -M (for SELinux).




OUTPUT MODIFIERS
       c      Show the true command name.  This is derived from the name of the executable file, rather than from the argv value.  Command arguments and any
              modifications to them are thus not shown.  This option effectively turns the args format keyword into the comm format keyword; it is useful with
              the -f format option and with the various BSD-style format options, which all normally display the command arguments.  See the -f option, the
              format keyword args, and the format keyword comm.

       --cols n
              Set screen width.

       --columns n
              Set screen width.

       --cumulative
              Include some dead child process data (as a sum with the parent).

       e      Show the environment after the command.

       f      ASCII art process hierarchy (forest).

       --forest
              ASCII art process tree.

       h      No header.  (or, one header per screen in the BSD personality).  The h option is problematic.  Standard BSD ps uses this option to print a header
              on each page of output, but older Linux ps uses this option to totally disable the header.  This version of ps follows the Linux usage of not
              printing the header unless the BSD personality has been selected, in which case it prints a header on each page of output.  Regardless of the
              current personality, you can use the long options --headers and --no-headers to enable printing headers each page or disable headers entirely,
              respectively.

       -H     Show process hierarchy (forest).

       --headers
              Repeat header lines, one per page of output.

       k spec Specify sorting order.  Sorting syntax is [+|-]key[,[+|-]key[,...]].  Choose a multi-letter key from the STANDARD FORMAT SPECIFIERS section.  The
              "+" is optional since default direction is increasing numerical or lexicographic order.  Identical to --sort.

                      Examples:
                      ps jaxkuid,-ppid,+pid
                      ps axk comm o comm,args
                      ps kstart_time -ef

       --lines n
              Set screen height.

       n      Numeric output for WCHAN and USER (including all types of UID and GID).

       --no-headers
              Print no header line at all.  --no-heading is an alias for this option.

       O order
              Sorting order (overloaded).  The BSD O option can act like -O (user-defined output format with some common fields predefined) or can be used to
              specify sort order.  Heuristics are used to determine the behavior of this option.  To ensure that the desired behavior is obtained (sorting or
              formatting), specify the option in some other way (e.g.  with -O or --sort).

              For sorting, obsolete BSD O option syntax is O[+|-]k1[,[+|-]k2[,...]].  It orders the processes listing according to the multilevel sort specified
              by the sequence of one-letter short keys k1,k2, ...  described in the OBSOLETE SORT KEYS section below.  The "+" is currently optional, merely
              re-iterating the default direction on a key, but may help to distinguish an O sort from an O format.  The "-" reverses direction only on the key it
              precedes.

       --rows n
              Set screen height.


       S      Sum up some information, such as CPU usage, from dead child processes into their parent.  This is useful for examining a system where a parent
              process repeatedly forks off short-lived children to do work.

       --sort spec
              Specify sorting order.  Sorting syntax is [+|-]key[,[+|-]key[,...]].  Choose a multi-letter key from the STANDARD FORMAT SPECIFIERS section.  The
              "+" is optional since default direction is increasing numerical or lexicographic order.  Identical to k.  For example: ps jax --sort=uid,-ppid,+pid

       w      Wide output.  Use this option twice for unlimited width.

       -w     Wide output.  Use this option twice for unlimited width.

       --width n
              Set screen width.

THREAD DISPLAY
       H      Show threads as if they were processes.

       -L     Show threads, possibly with LWP and NLWP columns.

       m      Show threads after processes.

       -m     Show threads after processes.

       -T     Show threads, possibly with SPID column.

OTHER INFORMATION
       --help section
              Print a help message.  The section argument can be one of simple, list, output, threads, misc or all.  The argument can be shortened to one of the
              underlined letters as in: s|l|o|t|m|a.

       --info Print debugging info.

       L      List all format specifiers.

       V      Print the procps-ng version.

       -V     Print the procps-ng version.

       --version
              Print the procps-ng version.



PROCESS FLAGS
       The sum of these values is displayed in the "F" column, which is provided by the flags output specifier:

               1    forked but didn't exec
               4    used super-user privileges

PROCESS STATE CODES
       Here are the different values that the s, stat and state output specifiers (header "STAT" or "S") will display to describe the state of a process:

               D    uninterruptible sleep (usually IO)
               R    running or runnable (on run queue)
               S    interruptible sleep (waiting for an event to complete)
               T    stopped by job control signal
               t    stopped by debugger during the tracing
               W    paging (not valid since the 2.6.xx kernel)
               X    dead (should never be seen)
               Z    defunct ("zombie") process, terminated but not reaped by its parent

       For BSD formats and when the stat keyword is used, additional characters may be displayed:

               <    high-priority (not nice to other users)
               N    low-priority (nice to other users)
               L    has pages locked into memory (for real-time and custom IO)
               s    is a session leader
               l    is multi-threaded (using CLONE_THREAD, like NPTL pthreads do)
               +    is in the foreground process group

OBSOLETE SORT KEYS
       These keys are used by the BSD O option (when it is used for sorting).  The GNU --sort option doesn't use these keys, but the specifiers described below
       in the STANDARD FORMAT SPECIFIERS section.  Note that the values used in sorting are the internal values ps uses and not the "cooked" values used in some
       of the output format fields (e.g.  sorting on tty will sort into device number, not according to the terminal name displayed).  Pipe ps output into the
       sort(1) command if you want to sort the cooked values.

       KEY   LONG         DESCRIPTION
       c     cmd          simple name of executable
       C     pcpu         cpu utilization
       f     flags        flags as in long format F field
       g     pgrp         process group ID
       G     tpgid        controlling tty process group ID
       j     cutime       cumulative user time
       J     cstime       cumulative system time
       k     utime        user time
       m     min_flt      number of minor page faults
       M     maj_flt      number of major page faults
       n     cmin_flt     cumulative minor page faults
       N     cmaj_flt     cumulative major page faults
       o     session      session ID
       p     pid          process ID
       P     ppid         parent process ID
       r     rss          resident set size
       R     resident     resident pages
       s     size         memory size in kilobyFORMAT DESCRIPTORS
       This ps supports AIX format descriptors, which work somewhat like the formatting codes of printf(1) and printf(3).  For example, the normal default output
       can be produced with this: ps -eo "%p %y %x %c".  The NORMAL codes are described in the next section.

       CODE   NORMAL   HEADER
       %C     pcpu     %CPU
       %G     group    GROUP
       %P     ppid     PPID
       %U     user     USER
       %a     args     COMMAND
       %c     comm     COMMAND
       %g     rgroup   RGROUP
       %n     nice     NI
       %p     pid      PID
       %r     pgid     PGID
       %t     etime    ELAPSED
       %u     ruser    RUSER
       %x     time     TIME
       %y     tty      TTY
       %z     vsz      VSZ

tes
       S     share        amount of shared pages
       t     tty          the device number of the controlling tty
       T     start_time   time process was started
       U     uid          user ID number
       u     user         user name
       v     vsize        total VM size in KiB
       y     priority     kernel scheduling priority



STANDARD FORMAT SPECIFIERS
       Here are the different keywords that may be used to control the output format (e.g. with option -o) or to sort the selected processes with the GNU-style
       --sort option.

       For example: ps -eo pid,user,args --sort user

       This version of ps tries to recognize most of the keywords used in other implementations of ps.

       The following user-defined format specifiers may contain spaces: args, cmd, comm, command, fname, ucmd, ucomm, lstart, bsdstart, start.

       Some keywords may not be available for sorting.

       CODE        HEADER    DESCRIPTION

       %cpu        %CPU      cpu utilization of the process in "##.#" format.  Currently, it is the CPU time used divided by the time the process has been
                             running (cputime/realtime ratio), expressed as a percentage.  It will not add up to 100% unless you are lucky.  (alias pcpu).

       %mem        %MEM      ratio of the process's resident set size  to the physical memory on the machine, expressed as a percentage.  (alias pmem).

       args        COMMAND   command with all its arguments as a string. Modifications to the arguments may be shown.  The output in this column may contain
                             spaces.  A process marked <defunct> is partly dead, waiting to be fully destroyed by its parent.  Sometimes the process args will be
                             unavailable; when this happens, ps will instead print the executable name in brackets.  (alias cmd, command).  See also the comm
                             format keyword, the -f option, and the c option.
                             When specified last, this column will extend to the edge of the display.  If ps can not determine display width, as when output is
                             redirected (piped) into a file or another command, the output width is undefined (it may be 80, unlimited, determined by the TERM
                             variable, and so on).  The COLUMNS environment variable or --cols option may be used to exactly determine the width in this case.
                             The w or -w option may be also be used to adjust width.

       blocked     BLOCKED   mask of the blocked signals, see signal(7).  According to the width of the field, a 32 or 64-bit mask in hexadecimal format is
                             displayed.  (alias sig_block, sigmask).

       bsdstart    START     time the command started.  If the process was started less than 24 hours ago, the output format is " HH:MM", else it is " Mmm:SS"
                             (where Mmm is the three letters of the month).  See also lstart, start, start_time, and stime.

       bsdtime     TIME      accumulated cpu time, user + system.  The display format is usually "MMM:SS", but can be shifted to the right if the process used
                             more than 999 minutes of cpu time.

       c           C         processor utilization. Currently, this is the integer value of the percent usage over the lifetime of the process.  (see %cpu).

       caught      CAUGHT    mask of the caught signals, see signal(7).  According to the width of the field, a 32 or 64 bits mask in hexadecimal format is
                             displayed.  (  sig_catch, sigcatch).

       cgname      CGNAME    display name of control groups to which the process belongs.

       cgroup      CGROUP    display control groups to which the process belongs.

       class       CLS       scheduling class of the process.  (alias policy, cls).  Field's possible values are:

                                      -   not reported
                                      TS  SCHED_OTHER
                                      FF  SCHED_FIFO
                                      RR  SCHED_RR
                                      B   SCHED_BATCH
                                      ISO SCHED_ISO
                                      IDL SCHED_IDLE
                                      ?   unknown value




 cmd         CMD       see args.  (alias args, command).

       comm        COMMAND   command name (only the executable name).  Modifications to the command name will not be shown.  A process marked <defunct> is partly
                             dead, waiting to be fully destroyed by its parent.  The output in this column may contain spaces.  (alias ucmd, ucomm).  See also
                             the args format keyword, the -f option, and the c option.
                             When specified last, this column will extend to the edge of the display.  If ps can not determine display width, as when output is
                             redirected (piped) into a file or another command, the output width is undefined (it may be 80, unlimited, determined by the TERM
                             variable, and so on).  The COLUMNS environment variable or --cols option may be used to exactly determine the width in this case.
                             The w or -w option may be also be used to adjust width.

       command     COMMAND   See args.  (alias args, command).

       cp          CP        per-mill (tenths of a percent) CPU usage.  (see %cpu).

       cputime     TIME      cumulative CPU time, "[DD-]hh:mm:ss" format.  (alias time).

       drs         DRS       data resident set size, the amount of physical memory devoted to other than executable code.

       egid        EGID      effective group ID number of the process as a decimal integer.  (alias gid).

       egroup      EGROUP    effective group ID of the process.  This will be the textual group ID, if it can be obtained and the field width permits, or a
                             decimal representation otherwise.  (alias group).

       eip         EIP       instruction pointer.

       esp         ESP       stack pointer.

       etime       ELAPSED   elapsed time since the process was started, in the form [[DD-]hh:]mm:ss.

       etimes      ELAPSED   elapsed time since the process was started, in seconds.

       euid        EUID      effective user ID (alias uid).

       euser       EUSER     effective user name.  This will be the textual user ID, if it can be obtained and the field width permits, or a decimal
                             representation otherwise.  The n option can be used to force the decimal representation.  (alias uname, user).

       f           F         flags associated with the process, see the PROCESS FLAGS section.  (alias flag, flags).

       fgid        FGID      filesystem access group ID.  (alias fsgid).

       fgroup      FGROUP    filesystem access group ID.  This will be the textual group ID, if it can be obtained and the field width permits, or a decimal
                             representation otherwise.  (alias fsgroup).

       flag        F         see f.  (alias f, flags).

       flags       F         see f.  (alias f, flag).

       fname       COMMAND   first 8 bytes of the base name of the process's executable file.  The output in this column may contain spaces.

       fuid        FUID      filesystem access user ID.  (alias fsuid).

       fuser       FUSER     filesystem access user ID.  This will be the textual user ID, if it can be obtained and the field width permits, or a decimal
                             representation otherwise.

       gid         GID       see egid.  (alias egid).

       group       GROUP     see egroup.  (alias egroup).

       ignored     IGNORED   mask of the ignored signals, see signal(7).  According to the width of the field, a 32 or 64 bits mask in hexadecimal format is
                             displayed.  (alias sig_ignore, sigignore).

       ipcns       IPCNS     Unique inode number describing the namespace the process belongs to. See namespaces(7).

       label       LABEL     security label, most commonly used for SELinux context data.  This is for the Mandatory Access Control ("MAC") found on
                             high-security systems.

       lstart      STARTED   time the command started.  See also bsdstart, start, start_time, and stime.

       lsession    SESSION   displays the login session identifier of a process, if systemd support has been included.

