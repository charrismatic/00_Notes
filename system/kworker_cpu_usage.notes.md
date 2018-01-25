What is kworker? kworker means a Linux kernel process doing "work" (processing system calls). You can have several of them in your process list: kworker/0:1 is the one on your first CPU core, kworker/1:1 the one on your second etc..

Why does kworker hog your CPU? To find out why a kworker is wasting your CPU, you can create CPU backtraces: watch your processor load (with top or something) and in moments of high load through kworker, execute echo l > /proc/sysrq-trigger to create a backtrace. (On Ubuntu, this needs you to login with sudo -s). Do this several times, then watch the backtraces at the end of dmesg output. See what happens frequently in the CPU backtraces, it hopefully points you to the source of your problem.

Example: e1000e. In my case, I found a backtrace like this nearly every time:

Call Trace:
 delay_tsc+0x4a/0x80
 __const_udelay+0x2c/0x30
 e1000_acquire_swflag_ich8lan+0xa2/0x240 [e1000e]
 e1000e_read_phy_reg_igp+0x29/0x80 [e1000e]
 e1000e_phy_has_link_generic+0x85/0x120 [e1000e]
 e1000_check_for_copper_link_ich8lan+0x48/0x930 [e1000e]
 e1000e_has_link+0x55/0xd0 [e1000e]
 e1000_watchdog_task+0x5e/0x960 [e1000e]
It hinted me to a problem in the e1000e Ethernet card module, and indeed a sudo rmmod e1000e made the high CPU load go away immediately


