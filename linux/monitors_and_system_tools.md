https://www.cyberciti.biz/tips/identifying-linux-bottlenecks-sar-graphs-with-ksar.html

https://www.cyberciti.biz/tips/top-linux-monitoring-tools.html

# SYSTEM MONITORING 

nmon - systems administrator, tuner, benchmark tool.



sar - Collect, report, or save system activity information.

mpstat - Report processors related statistics.

sadf - Display data collected by sar in multiple formats.

top

htop

atop





## I/O 

iotop - drive read /writes 

iostat



## CPU 

mpstat -P ALL

slabtop



## NETWORK 

vnstat  - A console-based network traffic monitor

netstat 

nc — arbitrary TCP and UDP connections and listens

ss - another utility to investigate sockets

nethogs

nmap - Network exploration tool and security / port scanner

iptraf 

tcpdump

iftop 

mtr - a network diagnostic tool



## MEMORY

lsmem - list the ranges of available memory with their online status

free

pmap - report memory map of a process

​	`sudo pmap -XX 1082` 



vmstat - Report virtual memory statistics



## PROCESSES 



sysdig - the definitive system and process troubleshooting tool 



## USERS 

w - Show who is logged on and what they are doing.

ac -  print statistics about users' connect time

sa -  summarizes accounting information

last, lastb - show a listing of last logged in users

## GENERAL  

lsof 

acct - switch process accounting on or off

lastcomm -  print out information about previously executed commands.