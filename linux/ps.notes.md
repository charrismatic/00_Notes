### LIST TOP PROCESS BY MEMORY/CPU USAGE 
```
ps aux --sort -rss  | head -n2
```

Get additional information about that process

```
sudo pmap -[x,X,XX] [pid]
```

```
cat /proc/[pid]/*
tree /proc/[pid]
find /proc/[pid]/ -type f -not -name pagemap -ls
find /proc/[pid]/ -maxdepth 1 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
cat /proc/[pid]/stat
cat /proc/[pid]/status
cat /proc/[pid]/smaps 
lsof -p [pid]
```


PROCESS STATE CODES
       Here are the different values that the s, stat and state output specifiers (header "STAT" or "S") will display to describe the state of a process:
       D    uninterruptible sleep (usually IO)
       R    running or runnable (on run queue)
       S    interruptible sleep (waiting for an event to complete)
       T    stopped, either by a job control signal or because it is being traced.
       W    paging (not valid since the 2.6.xx kernel)
       X    dead (should never be seen)
       Z    defunct ("zombie") process, terminated but not reaped by its parent.

       For BSD formats and when the stat keyword is used, additional characters may be displayed:
       <    high-priority (not nice to other users)
       N    low-priority (nice to other users)
       L    has pages locked into memory (for real-time and custom IO)
       s    is a session leader
       l    is multi-threaded (using CLONE_THREAD, like NPTL pthreads do)
       +    is in the foreground process group.


PROCESS FLAGS
The sum of these values is displayed in the "F" column, which is provided by the flags output specifier:

     1    forked but didn't exec
     4    used super-user privileges


SIMPLE PROCESS SELECTION
a -- all proccess you are running
T -- this terminal
r -- only running
x -- all processes all users


--deselct or -N 



ps axo stat,euid,ruid,tty,tpgid,sess,pgrp,ppid,pid,,comm
ps -eo pid,tid,class,rtprio,ni,pri,psr,pcpu,stat,,


ps ax k +maj_flt -o etime,user,gid,nice,stat,c,pmem,size,maj_flt,min_flt,comm -w

 ps a -w -o user,gid=GROUP,pid,etimes=ELAPSED,cputime=CPUTIME,maj_flt=ERR,nice,pcpu,pmem,size,s=S,f,wchan=CHAN,comm T --sort=etimes


#SELECT COMMAND
ps -C chrome

#SELECT USER
ps -U www-data

#DISPLAY THREADS 
ps -L 

#DISPLAY AS FOREST f or --forest

# REMOVE KERNEL PROCESSES BY PPIDLIST (WHICH MIGHT BE 2 ACCORDING TO INTERNET)
ps --ppid 2 -p 2 --deselect -w -o user,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,size,f,s=,wchan=STATE,tty,comm,command --sort=maj_flt --cols=180 

#USE GREP TO FILTER BRACKETS BECAUSE OF THESE COMMADS HAVE NO ARGUMENTS
ps ax -w -o user,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,size,f,s=,wchan=STATE,tty,comm,command --sort=maj_flt --cols=180 | grep -v ]$

# basically the same as this  
ps aux | awk '$NF!~/^\[.+\]$/' 


# ALIGN THINGS THROUGH COLUMN -t COMMAND TO LINE THEM UP PERFECT


# NICE FORMATTED LIST TOP PROGRAM SIZE IN MB
ps --deselect -U root -w -o size=SIZE,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,f,s=,wchan=STATE,tty,user=USER,comm,command --sort=-size --width=180 | head -n 20 | awk '{ hr=$1/1024 ; printf("%12.1f Mb ",hr) } { for ( x=4 ; x<=NF ; x++ ) { printf("%s ",$x) } print "" }'

# NICE FORMATTED LIST TOP PROGRAM SIZE IN GB 
ps --deselect -U root -w -o size=SIZE,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,f,s=,wchan=STATE,tty,user=USER,comm,command --sort=-size --width=180 | head -n 20 | awk '{ hr=$1/1048576 ; printf("%6.2f Gb ",hr) } { for ( x=4 ; x<=NF ; x++ ) { printf("%s ",$x) } print "" }'



... | (for i in $(seq 3); do read -r; printf "%s\n" "$REPLY"; done; sort -rk1.47,1.66)
head -n 3 && tail -n +4  | sort -rk1.47,1.66
#### MODIFYING NUMBER OUTPUT FROM PS --> TO HUMAN READABLE
#REPORT SIZE 
 ps --deselect -U root -w -o size=SIZE,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,f,s=S,wchan=STATE,tty,user=USER,comm,command --sort=-size --width=120 | head -n 20 | awk '{ hr=$1/1048576 ; printf("%6.2f Gb ",hr) } { for ( x=4 ; x<=NF ; x++ ) { printf("%s ",$x) } print "" }' | column -t

#REPORT LONG RUNNING PROC
ps --deselect -U root -o etimes=RUNTIME,gid=GROUP,pid,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,f,s=S,wchan=STATE,tty,user=USER,comm,command --sort=-etimes --width=120 | head -n 20 | awk '{ hr=$1/3600 ; printf("  %5.3f hr ",hr) } { for ( x=4 ; x<=NF ; x++ ) { printf("%s ",$x) } print "" }' | column -t -n 

ps -U root -N -o etimes=RUNTIME,gid=GROUP,pid,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,f,s=S,wchan=STATE,tty,user=USER,comm,command --sort=-etimes --width=120 | grep -v ]$ | head -n 


#ADDITIONALLY WE CAN USE THE SORT COMMAND FOR MORE CONSISTENT SORTING -- THE BUILT IN SORT IN PS WAS NEVER COMPLETELY CORRECT


#everything but the root 
ps ax --deselect -U root -w -o user,gid=GROUP,pid,cputime=CPUTIME,etimes=SUM,maj_flt=ERR,nice,pcpu,pmem,size,f,s=,wchan=STATE,tty,comm,command --sort=maj_flt --width=180 | head -n 30

o see every process running as root (real & effective ID) in user format:
          ps -U root -u root u


To see every process with a user-defined format
ps -eo pcpu,wchan:14,comme




ALL FORMAT SPECIFIERS IN PS
%cpu         %CPU    
%mem         %MEM    
_left        LLLLLLLL
_left2       L2L2L2L2
_right       RRRRRRRR
_right2      R2R2R2R2
_unlimited   U       
_unlimited2  U2      
alarm        ALARM   
args         COMMAND 
atime        TIME    
blocked      BLOCKED 
bsdstart     START   
bsdtime      TIME    
c            C       
caught       CAUGHT  
cgroup       CGROUP  
class        CLS     
cls          CLS     
cmd          CMD     
comm         COMMAND 
command      COMMAND 
context      CONTEXT 
cp           CP      
cpuid        CPUID   
cputime      TIME    
drs          DRS     
dsiz         DSIZ    
egid         EGID    
egroup       EGROUP  
eip          EIP     
esp          ESP     
etime        ELAPSED 
etimes       ELAPSED 
euid         EUID    
euser        EUSER   
f            F       
fgid         FGID    
fgroup       FGROUP  
flag         F       
flags        F       
fname        COMMAND 
fsgid        FSGID   
fsgroup      FSGROUP 
fsuid        FSUID   
fsuser       FSUSER  
fuid         FUID    
fuser        FUSER   
gid          GID     
group        GROusedUP   
ignored      IGNORED 
intpri       PRI     
ipcns        IPCNS   
label        LABEL   
lastcpu      C       
lim          LIM     
longtname    TTY     
lsession     SESSION 
lstart       STARTED 
lwp          LWP     
m_drs        DRS     
m_size       SIZE    
m_trs        TRS     
machine      MACHINE 
maj_flt      MAJFL   
majflt       MAJFLT  
min_flt      MINFL   
minflt       MINFLT  
mntns        MNTNS   
netns        NETNS   
ni           NI      
nice         NI      
nlwp         NLWP    
nwchan       WCHAN   
opri         PRI     
ouid         OWNER   
pagein       PAGEIN  
pcpu         %CPU    
pending      PENDING 
pgid         PGID    
pgrp         PGRP    
pid          PID     
pidns        PIDNS   
pmem         %MEM    
policy       POL     
ppid         PPID    
pri          PRI     
pri_api      API     
pri_bar      BAR     
pri_baz      BAZ     
pri_foo      FOO     
priority     PRI     
psr          PSR     
rgid         RGID    
rgroup       RGROUP  
rss          RSS     
rssize       RSS     
rsz          RSZ     
rtprio       RTPRIO  
ruid         RUID    
ruser        RUSER   
s            S       
sched        SCH     
seat         SEAT    
sess         SESS    
session      SESS    
sgi_p        P       
sgi_rss      RSS     
sgid         SGID    
sgroup       SGROUP  
sid          SID     
sig          PENDING 
sig_block    BLOCKED 
sig_catch    CATCHED 
sig_ignore   IGNORED 
sig_pend     SIGNAL  
sigcatch     CAUGHT  
sigignore    IGNORED 
sigmask      BLOCKED 
size         SIZE    
slice        SLICE   
spid         SPID    
stackp       STACKP  
start        STARTED 
start_stack  STACKP  
start_time   START   
stat         STAT    
state        S       
stime        STIME   
suid         SUID    
supgid       SUPGID  
supgrp       SUPGRP  
suser        SUSER   
svgid        SVGID   
svgroup      SVGROUP 
svuid        SVUID   
svuser       SVUSER  
sz           SZ      
thcount      THCNT   
tgid         TGID    
tid          TID     
time         TIME    
tname        TTY     
tpgid        TPGID   
trs          TRS     
trss         TRSS    
tsig         PENDING 
tsiz         TSIZ    
tt           TT      
tty          TT      
tty4         TTY     
tty8         TTY     
ucmd         CMD     
ucomm        COMMAND 
uid          UID     
uid_hack     UID     
uname        USER    
unit         UNIT    
user         USER    
userns       USERNS  
util         C       
utsns        UTSNS   
uunit        UUNIT   
vsize        VSZ     
vsz          VSZ     
wchan        WCHAN   
wname        WCHAN   
zone         ZONE  
