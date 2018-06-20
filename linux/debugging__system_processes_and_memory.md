### Get Top Process 

ps --sort -rss -eo rss,pid,command | head

 ps aux --sort -rss | head -n15
10494  ps aux  | head -n1
10495  ps aux  | head -n2
10496  ps aux --sort -rss  | head -n3
10497  ps aux --sort -rss  | head -n2

10103  lsof | head
10484  ps aux --sort -rss | head
10485  ps aux | sort -rss -k 6 | head -n15
10486  ps aux  | head -n15
10487  ps aux --sort  | head -n15
10488  ps aux --sort --rss  | head -n15
10489  ps aux --sort -rss -k 6 | head -n15
10490  ps aux --sort -rss | head -n15
10494  ps aux  | head -n1
10495  ps aux  | head -n2
10496  ps aux --sort -rss  | head -n3
10497  ps aux --sort -rss  | head -n2 
10524  ps aux --sort -rss  | head -n2



## GET DETAILS ABOUT THAT PROCESS



83  man pmap
10384  sudo pmap -X -x 29204 
10385  sudo pmap -X 29204 
10386  sudo pmap -XX 29204 
10387  ps -p 29204
10388  cat /proc/29204
10389  cat /proc/29204/*
10390  tree /proc/29204/
10391  tree /proc/29204/task/
10392  tree /proc/29204/task/29204/attr/*
10393  cat /proc/29204/task/29204/attr/current 
10394  cat /proc/29204/task/29204/attr/*
10395  cat /proc/29204/task/29204/status 
10396  cat /proc/29204/task/29204/stat
10397  cat /proc/29204/task/29204/children 
10398  cat /proc/29204/task/29204/personality 
10399  cat /proc/stat 
10400  cat /proc/29204/stat
10401  cat /proc/29204/status
10402  ls  /proc/29204/
10403  ll /proc/29204/
10404  cat /proc/29204/attr/*
10405  cat /proc/29204/io 
10406  cat /proc/29204/smaps
10407  cat /proc/29204/smaps | grep size
10408  cat /proc/29204/smaps | grep Size
10409  cat /proc/29204/smaps | grep Size:
10410  cat /proc/29204/smaps | grep Size\: 
10411  cat /proc/29204/smaps | grep ^Size\:
10412  cat /proc/29204/smaps | grep Size: --before-context 2
10413  cat /proc/29204/smaps | grep Size: --before-context 1
10414  cat /proc/29204/smaps | grep ^Size: --before-context 1~
10415  psgrep gnmoe
10416  psgrep 
10417  psgrep -h
10418  psgrep shell
10419  psgrep snome
10420  psgrep gnome
10421  psgrep facebook
10422  cat /proc/29204/* | grep memory
10423  cat /proc/29204/* 
10424  cat /proc/29204/wchan 
10425  cat /proc/29204/ns/user 
10426  cat /proc/29204/net/*
10427  cat /proc/29204/pagemap 
10428  cat /proc/29204/
10429  find /proc/29204/ -type f
10430  find /proc/29204/ -type f -exec cat {} \;
10431  find /proc/29204/ -type f --pricnt -exec cat {} \;
10432  find /proc/29204/ -type f  -exec cat {} \;
10433  find /proc/29204/ -type f -name 
10434  find /proc/29204/ -type f -name pagemap
10435  find /proc/29204/ -type f -vname pagemap
10436  find /proc/29204/ -type f -name pagemap -V
10437  find /proc/29204/ -type f -name pagemap 
10438  find /proc/29204/ -type f -no name pagemap 
10439  find /proc/29204/ -type f -not -name pagemap 
10440  find /proc/29204/ -type f -not -name pagemap -print0
10441  find /proc/29204/ -type f -not -name pagemap -print
10442  find /proc/29204/ -type f -not -name pagemap -fprint
10443  find /proc/29204/ -type f -not -name pagemap 
10444  find /proc/29204/ -type f -not -name pagemap -ls
10445  man find
10446  find /proc/29204/ -type f -not -name pagemap -exec cat {} \;
10447  find /proc/29204/ -type f -not -name pagemap -not -name attr
10448  find /proc/29204/ -type f -not -name pagemap -not -name attr -exec cat {} \;
10449  find /proc/29204/ -type f -depth 1 -not -name pagemap -not -name attr 
10450  find /proc/29204/ -type f -maxdepth 1 -not -name pagemap -not -name attr 
10451  find /proc/29204/ -type f -maxdepth 3 -not -name pagemap -not -name attr 
10452  find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr 
10453  find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec {} \;
10454  find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \;
10455  find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \; | more
10456  find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \; | grep memory
10457  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep memory
10458  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep mem
10459  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep name
10460  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep error
10461  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
10462  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
10463  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
10464  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -
10465  find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr 
10466  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name net
10467  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -path net
10468  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -path net*
10469  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -path *net*
10470  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name smap
10471  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name sma
10472  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name 
10473  find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr 
10474  cat /proc/29204/sessionid
10475  cat /proc/29204/environ
10476  cat /proc/29204/mem
10477  ps aux | grep gnome
10478  crash-watch -h
10479  crash-watch 29204
10480  sudo crash-watch 29204
10481  htop
10482  ps aux --sort -rss
10483  ps aux --sort -rss | HEAD
10484  ps aux --sort -rss | head







10342  lsof -p 29670
10343  lsof -p 29671
10344  man lsof
10345  sudo lsof -p 29671
10346  ps a
10347  ps x
10348  ps 
10349  ps t12
10350  ps t3
10351  
10352  ps t2
10353  ps t1
10354  crash-watch -h
10355  crash-watch 29204
10356  sudo crash-watch 29204
10357  lsof -p 29670
10358  lsof -p 29671
10359  man lsof
10360  sudo lsof -p 29671
10361  ps x
10362  ps 
10363  ps t12
10364  ps t3

10244  lsof | grep StyleThre | more
10245  ps aux
10246  ps aux -p 31386
10247  ps aux -P 31386
10248  ps -P 31386
10249  ps 31386
10250  ps P 31386
10251  ps -p 31386
10252  ps aux | grpe  31386
10253  ps aux | grep  31386
10254  ps aux 
10255  man ps
10256  man pgret
10257  man pgrep
10258  man proc
10259  proc  31386
10260  pgrep  31386
10261  lsof
10262  lsof | grep font 
10263  lsof | grep font > ./99_System/losf_fonts
10264  cd 99_System/
10265  cat losf_fonts 
10266  cat losf_fonts | sort 
10267  cat losf_fonts | sort > sorted
10268  lsof -w 
10269  lsof -ww
10270  lsof -S
10271  lsof S
10272  lsof f
10273  lsof -f W
10274  lsof -f 
10275  lsof -fL
10276  lsof -f
10277  lsof -fWIDE
10278  lsof -f -ide
10279  lsof -f -wide
10280  ps -f 
10281  ps -F
10282  ps -f W
10283  ps U
10284  ps ely
10285  ps el'
10286  ps el
10287  ps e
10288  ps eA
10289  ps ea
10290  ps eax
10291  lsof | grep cache
10292  lsof -Di
10293  lsof -D
10294  lsof -d
10295  man lsof
10296  lsof  -c w5
10297  lsof  -c 130
10298  lsof  -c30
10299  lsof  -c 6
10300  lsof  -c
10301  lsof -c 5
10302  lsof +c
10303  lsof +c 30
10304  lsof +c 16
10305  lsof +c 4
10306  lsof +c 3 
10307  lsof +c 0



489  ps aux --sort -rss -k 6 | head -n15
10490  ps aux --sort -rss | head -n15
10491  ps aux | sort -rn -k 5,6
10492  valgrind
10493  pmap
10494  ps aux  | head -n1
10495  ps aux  | head -n2
10496  ps aux --sort -rss  | head -n3
10497  ps aux --sort -rss  | head -n2
10498  sudo crash-watch -d
10499  ##sudo crash-watch 1371 29204 icarus   29204 19.6  6.8 4446272 564292 tty2   Sl+  11:26  24:13 /usr/bin/gnome-she
10500  sudo crash-watch 29204
10501  crash-watch --help
10502  crash-watch --dump
10503  sudo crash-watch -dump 29204
10504  sudo crash-watch --dump 29204
10505  htop
10506  crash-watch --dump
10507  sudo crash-watch -dump 29204
10508  sudo crash-watch --dump 29204
10509  htop
10510  ll package_library/
10511  ll dev_ops/
10512  tree dev_ops/ 
10513  tree -L 2dev_ops/ 
10514  tree -L 2 dev_ops/static_analysis_tools/
10515  tree -L 2 
10516  cd package_library/
10519  cd dev_ops/static_analysis_tools/
10521  cd acorn/
10522  cat package.json 
10524  ps aux --sort -rss  | head -n2
10525  sudo crash-watch -d
10526  ##sudo crash-watch 1371 29204 icarus   29204 19.6  6.8 4446272 564292 tty2   Sl+  11:26  24:13 /usr/bin/gnome-she
10527  sudo crash-watch 29204
10528  crash-watch --help
10529  crash-watch --dump
10530  sudo crash-watch -dump 29204
10531  sudo crash-watch --dump 29204
10532  cd
10533  cd /data/projects/
10534  mkdir electron_apps
10537  mkdir Chrome_Apps 
10538  cd Chrome_Apps/
10540  ;l





10059  fc-validate -l
10060  fc-validate -i
10061  man fc
10062  which fc
10063  what
10064  alias what
10065  type what
10066  what fc
10067  type fc
10068  fc-scan
10069  fc-cache
10070  man fc-cache
10071  fc-cach 
10072  fc-list
10073  fc-cat
10074  ps a
10075  ps ax 
10076  fc-cache -v
10077  fc-cache -vr
10078  sudo fc-cache -vr
10079  man lsof
10080  lsof -f
10081  lsof /home/icarus/ +f c
10082  lsof /home/icarus/ +f
10083  lsof /home/icarus/ -f
10084  lsof -f /home/icarus/ 
10085  lsof -- /home/icarus/ 
10086  lsof -f -- /home/icarus/ 
10087  lsof +f -- /home/icarus/ c
10088  lsof +fc -- /home/icarus/ 
10089  lsof +f c -- /home/icarus/ 
10090  lsof +f [c] -- /home/icarus/ 
10091  lsof f-- /home/icarus/ 
10092  lsof f c-- /home/icarus/ 
10093  lsof -f-- /home/icarus/ 
10094  lsof -fc -- /home/icarus/ 
10095  lsof +f a -- /home/icarus/ 
10096  lsof +fa -- /home/icarus/ 
10097  lsof +ff  -- /home/icarus/ 
10098  lsof +c  -- /home/icarus/ 
10099  lsof +f  -- /home/icarus/ 
10100  lsof +F  -- /home/icarus/
10101  lsof -f  -- /home/icarus/ 
10102  lsof | wc -l
10103  lsof | head
10104  lsof -i -T -n
10105  sof -i
10106  lsof -i
10107  lsof -t
10108  lsof -a
10109  lsof -a -u icarus -i
10110  lsof -U
10111  lsof -U +f 0
10112  lsof -U -f 0
10113  lsof -U +c w
10114  lsof -U +c 56
10115  lsof -U +c 564
10116  lsof -U +c 4
10117  lsof -U +c 3
10118  lsof -U +c 1
10119  lsof -U +c 5
10120  lsof -U +c 0x15
10121  lsof -U +c 0x20
10122  lsof -U +c 0x50
10123  lsof -U +c 0
10124  lsof +c 0 -N
10125  lsof +c 0 -i tcp
10126  lsof +c 0 -C
10127  lsof +c 0 -c
10128  sudo lsof +c 0 -c
10129  sudo lsof -c
10130  ls /var/cache/
10131  cd /var/cache/
10132  type alias | grep size
10133  alias | grep size
10134  df
10135  folder_size_all=
10136  du -S --block-size=M
10137  du -S --block-size=MAll
10138  tree
10139  du -S --block-size=M 
10140  du 
10141  ll fontconfig/
10142  backup_history 
10143  type backup_histoyr
10144  type backup_histoy
10145  type backup_histry
10146  type backup_history 
10147  type history_sort 
10148  cat ~/.bash_history | grep -x '.\{3,\}' | sort --ignore-case --unique --merge > ~/.bash_history.tmp;
10149  ls .bash_history
10150  cat .bash_history.tmp 
10151  devices
10152  tree /proc/
10153  tree /proc/
10154  sudo apt install -f
10155  sudo apt-get update 
10156  sudo apt-get upgrade
10157  sudo apt-get upgrade -v
10158  apt -h
10159  man apt
10160  man apt-config
10161  sudo apt-get full-upgrade
10162  apt list --upgradeable
10163  apt list -a --upgradeable
10164  openvt 2
10165  openvt 1
10166  openvt 2 -v
10167  openvt -v 2 
10168  chvt 2
10169  man chvt
10170  sudo chvt2 
10171  ps -d
10172  ps -ra
10173  ps -rA
10174  ps -re
10175  ps -e
10176  ps -r
10177  ps -rx
10178  ps -C
10179  ps -t 2
10180  ps -t 1
10181  ps -at 1
10182  ps -au 1
10183  ps -ut 1
10184  ps -ut 2
10185  ps -ua 2
10186  ps -ua 2 -c
10187  ps -u-c
10188  ps -c
10189  ps -auc
10190  ps -au-f
10191  ps -au-fl
10192  ps -auF
10193  ps -auf
10194  ps -aufm
10195  ps -auM
10196  kill 29670
10197  ps -aum
10198  ps -au
10199  ps -aux
10200  journalctl 
10201  journalctl --reverse 
10202  dmesg
10203  ~ps
10204  lsof 29204
10205  lsof -p 29204
10206  man fontconfig
10207  man font2c 
10208  man -k font | grep cache
10209  man fc-cat 
10210  fc-cat -v
10211  fc-cat -
10212  fc-cat 
10213  fc-cat -h
10214  fc-cat -r
10215  man -k font
10216  ps x
10217  sudo lsof -p 29204
10218  sudo lsof -p 29204 | grep font
10219  lsof -d /var/cache
10220  sudo lsof -d /
10221  sudo lsof -d 
10222  sudo lsof -d /var/cache/fontconfig
10223  lsof /var/cache
10224  lsof -f /var/cache
10225  lsof -f -- /var/cache
10226  lsof +F 
10227  MAN LSOF
10228  lsof 
10229  lsf
10230  lsof -u StyleThre
10231  lsof u StyleThre
10232  lsof  StyleThre
10233  lsof -uStyleThre
10234  lsof -ustyleThre
10235  lsof -ustylethree
10236  lsof | grep StyleThre
10237  users | grep StyleThre~C 
10238  cat /etc/passwd | grep StyleThre~C 
10239  cat /etc/passwd | grep StyleThre
10240  cat /etc/passwd | grep Style
10241  cat /etc/passwd | grep Styl
10242  cat /etc/passwd | grep 
10243  cat /etc/passwd 
10244  lsof | grep StyleThre | more
10245  ps aux
10246  ps aux -p 31386
10247  ps aux -P 31386
10248  ps -P 31386
10249  ps 31386
10250  ps P 31386
10251  ps -p 31386
10252  ps aux | grpe  31386
10253  ps aux | grep  31386
10254  ps aux 
10255  man ps
10256  man pgret
10257  man pgrep
10258  man proc
10259  proc  31386
10260  pgrep  31386
10261  lsof
10262  lsof | grep font 
10263  lsof | grep font > ./99_System/losf_fonts
10264  cd 99_System/
10265  cat losf_fonts 
10266  cat losf_fonts | sort 
10267  cat losf_fonts | sort > sorted
10268  lsof -w 
10269  lsof -ww
10270  lsof -S
10271  lsof S
10272  lsof f
10273  lsof -f W
10274  lsof -f 
10275  lsof -fL
10276  lsof -f
10277  lsof -fWIDE
10278  lsof -f -ide
10279  lsof -f -wide
10280  ps -f 
10281  ps -F
10282  ps -f W
10283  ps U
10284  ps ely
10285  ps el'
10286  ps el
10287  ps e
10288  ps eA
10289  ps ea
10290  ps eax
10291  lsof | grep cache
10292  lsof -Di
10293  lsof -D
10294  lsof -d
10295  man lsof
10296  lsof  -c w5
10297  lsof  -c 130
10298  lsof  -c30
10299  lsof  -c 6
10300  lsof  -c
10301  lsof -c 5
10302  lsof +c
10303  lsof +c 30
10304  lsof +c 16
10305  lsof +c 4
10306  lsof +c 3 
10307  lsof +c 0
10308  sudo lsof +c 0 | grep font > losf_fonts2
10309  cat losf_fonts2 
10310  man lsof 
10311  apt -h
10312  man apt
10313  man apt-config
10314  sudo apt-get full-upgrade
10315  apt list --upgradeable
10316  apt list -a --upgradeable
10317  apt-get show crash
10318  apt show crash
10319  apt show crashme
10320  apt show crashmail
10321  gem install crash-watch
10322  sudo gem install crash-watch
10323  ps ax
10324  ps 
10325  fg
10326  jobs
10327  bs
10328  terminfo
10329  man terminfo
10330  tabws
10331  tabs
10332  tabs -h
10333  stty -h
10334  stty
10335  which stty 
10336  man stty 
10337  man tcap
10338  man clear
10339  man chvt
10340  man deallocvt
10341  man openvt
10342  lsof -p 29670
10343  lsof -p 29671
10344  man lsof
10345  sudo lsof -p 29671
10346  ps a
10347  ps x
10348  ps 
10349  ps t12
10350  ps t3
10351  
10352  ps t2
10353  ps t1
10354  crash-watch -h
10355  crash-watch 29204
10356  sudo crash-watch 29204
10357  lsof -p 29670
10358  lsof -p 29671
10359  man lsof
10360  sudo lsof -p 29671
10361  ps x
10362  ps 
10363  ps t12
10364  ps t3
10365  
10366  ps t2
10367  ps t1
10368  crash-watch 29204
10369  sudo crash-watch 29204
10370  cd 99_System/
10371  mkdir crash_watch
10372  cd crash_watch/
10373  crash-watch -h
10374  ps a
10375  ps ux
10376  ps uxa
10377  lsof -p 29204
10378  xosview
10379  sudo pmap -x 29204
10380  sudo pmap -x 29204 --extended
10381  sudo pmap --extended -x 29204 
10382  clear
10383  man pmap
10384  sudo pmap -X -x 29204 
10385  sudo pmap -X 29204 
10386  sudo pmap -XX 29204 
10387  ps -p 29204
10388  cat /proc/29204
10389  cat /proc/29204/*
10390  tree /proc/29204/
10391  tree /proc/29204/task/
10392  tree /proc/29204/task/29204/attr/*
10393  cat /proc/29204/task/29204/attr/current 
10394  cat /proc/29204/task/29204/attr/*
10395  cat /proc/29204/task/29204/status 
10396  cat /proc/29204/task/29204/stat
10397  cat /proc/29204/task/29204/children 
10398  cat /proc/29204/task/29204/personality 
10399  cat /proc/stat 
10400  cat /proc/29204/stat
10401  cat /proc/29204/status
10402  ls  /proc/29204/
10403  ll /proc/29204/
10404  cat /proc/29204/attr/*
10405  cat /proc/29204/io 
10406  cat /proc/29204/smaps
10407  cat /proc/29204/smaps | grep size
10408  cat /proc/29204/smaps | grep Size
10409  cat /proc/29204/smaps | grep Size:
10410  cat /proc/29204/smaps | grep Size\: 
10411  cat /proc/29204/smaps | grep ^Size\:
10412  cat /proc/29204/smaps | grep Size: --before-context 2
10413  cat /proc/29204/smaps | grep Size: --before-context 1
10414  cat /proc/29204/smaps | grep ^Size: --before-context 1~
10415  psgrep gnmoe
10416  psgrep 
10417  psgrep -h
10418  psgrep shell
10419  psgrep snome
10420  psgrep gnome
10421  psgrep facebook
10422  cat /proc/29204/* | grep memory
10423  cat /proc/29204/* 









---

*sudo pmap -x 29204 --extended
*sudo pmap -XX 29204 
cat /proc/29204
cat /proc/29204/
cat /proc/29204/*
cat /proc/29204/* 
cat /proc/29204/* | grep memory
cat /proc/29204/attr/*
cat /proc/29204/environ
cat /proc/29204/io 
cat /proc/29204/mem
cat /proc/29204/net/*
cat /proc/29204/ns/user 
cat /proc/29204/pagemap 
cat /proc/29204/sessionid
cat /proc/29204/smaps
cat /proc/29204/smaps | grep ^Size: --before-context 1~
cat /proc/29204/smaps | grep ^Size\:
cat /proc/29204/smaps | grep size
cat /proc/29204/smaps | grep Size
cat /proc/29204/smaps | grep Size:
cat /proc/29204/smaps | grep Size: --before-context 1
cat /proc/29204/smaps | grep Size: --before-context 2
cat /proc/29204/smaps | grep Size\: 
cat /proc/29204/stat
cat /proc/29204/status
cat /proc/29204/task/29204/attr/*
cat /proc/29204/task/29204/attr/current 
cat /proc/29204/task/29204/children 
cat /proc/29204/task/29204/personality 
cat /proc/29204/task/29204/stat
cat /proc/29204/task/29204/status 
cat /proc/29204/wchan 
cat /proc/stat 
cat ~/.bash_history | grep -x '.{3,}' | sort --ignore-case --unique --merge > ~/.bash_history.tmp;
cat losf_fonts 
cat losf_fonts | sort 
cat losf_fonts | sort > sorted
cat losf_fonts2 
cat package.json 
df
dmesg
du 
du -S --block-size=M
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr 
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name 
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name net
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name sma
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -name smap
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -path net
find /proc/29204/ -maxdepth 1 -type f -not -name pagemap -not -name attr -path net*
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr 
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; 
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep error
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep mem
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep memory
find /proc/29204/ -maxdepth 2 -type f -not -name pagemap -not -name attr -exec cat  {} \; | grep name
find /proc/29204/ -type f
find /proc/29204/ -type f  -exec cat {} \;
find /proc/29204/ -type f --pricnt -exec cat {} \;
find /proc/29204/ -type f -depth 1 -not -name pagemap -not -name attr 
find /proc/29204/ -type f -exec cat {} \;
find /proc/29204/ -type f -maxdepth 1 -not -name pagemap -not -name attr 
find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr 
find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec {} \;
find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \;
find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \; | grep memory
find /proc/29204/ -type f -maxdepth 2 -not -name pagemap -not -name attr -exec cat  {} \; | more
find /proc/29204/ -type f -maxdepth 3 -not -name pagemap -not -name attr 
find /proc/29204/ -type f -name 
find /proc/29204/ -type f -name pagemap
find /proc/29204/ -type f -name pagemap 
find /proc/29204/ -type f -name pagemap -V
find /proc/29204/ -type f -no name pagemap 
find /proc/29204/ -type f -not -name pagemap 
find /proc/29204/ -type f -not -name pagemap -exec cat {} \;
find /proc/29204/ -type f -not -name pagemap -fprint
find /proc/29204/ -type f -not -name pagemap -ls
find /proc/29204/ -type f -not -name pagemap -not -name attr
find /proc/29204/ -type f -not -name pagemap -not -name attr -exec cat {} \;
find /proc/29204/ -type f -not -name pagemap -print
find /proc/29204/ -type f -not -name pagemap -print0
find /proc/29204/ -type f -vname pagemap
lsof 
lsof  -c
lsof  -c 130
lsof  -c 6
lsof  -c w5
lsof  -c30
lsof  StyleThre
lsof -a
lsof -c 5
lsof -d
lsof -D
lsof -d /var/cache
lsof -Di
lsof -f
lsof -f 
lsof -f -- /var/cache
lsof -f -ide
lsof -f -wide
lsof -f /var/cache
lsof -f W
lsof -fL
lsof -fWIDE
lsof -i
lsof -i -T -n
lsof -p 29204
lsof -p 29670
lsof -p 29671
lsof -S
lsof -t
lsof -U
lsof -U -f 0
lsof -U +c 0
lsof -U +c 0x15
lsof -U +c 0x20
lsof -U +c 0x50
lsof -U +c 1
lsof -U +c 3
lsof -U +c 4
lsof -U +c 5
lsof -U +c 56
lsof -U +c 564
lsof -U +c w
lsof -U +f 0
lsof -u StyleThre
lsof -ustyleThre
lsof -uStyleThre
lsof -ustylethree
lsof -w 
lsof -ww
lsof /var/cache
lsof +c
lsof +c 0
lsof +c 0 -c
lsof +c 0 -C
lsof +c 0 -i tcp
lsof +c 0 -N
lsof +c 16
lsof +c 3 
lsof +c 30
lsof +c 4
lsof +F 
lsof | grep cache
lsof | grep font 
lsof | grep font > ./99_System/losf_fonts
lsof | grep StyleThre
lsof | grep StyleThre | more
lsof | head
lsof | wc -l
lsof 29204
lsof f
lsof S
lsof u StyleThre
openvt -v 2 
openvt 1
openvt 2
openvt 2 -v
pgrep  31386
pmap
proc  31386
ps 
ps --sort -rss -eo rss,pid,command | head
ps -at 1
ps -au
ps -au 1
ps -au-f
ps -au-fl
ps -auc
ps -auf
ps -auF
ps -aufm
ps -aum
ps -auM
ps -aux
ps -c
ps -C
ps -d
ps -e
ps -F
ps -f 
ps -f W
ps -p 29204
ps -p 31386
ps -P 31386
ps -r
ps -ra
ps -rA
ps -re
ps -rx
ps -t 1
ps -t 2
ps -u-c
ps -ua 2
ps -ua 2 -c
ps -ut 1
ps -ut 2
ps 31386
ps a
ps aux
ps aux 
ps aux  | head -n1
ps aux  | head -n15
ps aux  | head -n2
ps aux --sort  | head -n15
ps aux --sort --rss  | head -n15
ps aux --sort -rss
ps aux --sort -rss  | head -n2
ps aux --sort -rss  | head -n2 
ps aux --sort -rss  | head -n3
ps aux --sort -rss -k 6 | head -n15
ps aux --sort -rss | head
ps aux --sort -rss | HEAD
ps aux --sort -rss | head -n15
ps aux -p 31386
ps aux -P 31386
ps aux | grep  31386
ps aux | grep gnome
ps aux | grpe  31386
ps aux | sort -rn -k 5,6
ps aux | sort -rss -k 6 | head -n15
ps ax
ps ax 
ps e
ps ea
ps eA
ps eax
ps el
ps el'
ps ely
ps P 31386
ps t1
ps t12
ps t2
ps t3
ps U
ps ux
ps uxa
ps x
psgrep 
psgrep -h
psgrep facebook
psgrep gnmoe
psgrep gnome
psgrep shell
psgrep snome
sof -i
stty
stty -h
sudo apt install -f
sudo apt-get full-upgrade
sudo apt-get update 
sudo apt-get upgrade
sudo apt-get upgrade -v
sudo chvt2 
sudo crash-watch --dump 29204
sudo crash-watch -d
sudo crash-watch -dump 29204
sudo crash-watch 29204
sudo fc-cache -vr
sudo gem install crash-watch
sudo lsof -c
sudo lsof -d 
sudo lsof -d /
sudo lsof -d /var/cache/fontconfig
sudo lsof -p 29204
sudo lsof -p 29204 | grep font
sudo lsof -p 29671
sudo lsof +c 0 -c
sudo lsof +c 0 | grep font > losf_fonts2
sudo pmap --extended -x 29204 
sudo pmap -X -x 29204 
sudo pmap -x 29204
sudo pmap -X 29204 
tree -L 2 
tree -L 2 dev_ops/static_analysis_tools/
tree -L 2dev_ops/ 
tree /proc/
tree /proc/29204/
tree /proc/29204/task/
tree /proc/29204/task/29204/attr/*