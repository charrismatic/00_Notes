1.1 What is the magic SysRq key?

It is a 'magical' key combo you can hit which the kernel will respond to regardless of whatever else it is doing, unless it is completely locked up.

1.2 How do I enable the magic SysRq key?

sysrq is built into Ubuntu kernel but is disabled at boot time, by default, using 10-magic-sysrq.conf.

To re-enable it at boot time, you have to edit /etc/sysctl.d/10-magic-sysrq.conf file. ie uncommenting this line will enable all functions of sysrq:

#   1 - enable all functions of sysrq
When running a kernel with SysRq compiled in, /proc/sys/kernel/sysrq controls the functions allowed to be invoked via the SysRq key. Here is the list of possible values in /proc/sys/kernel/sysrq:

```
0 - disable sysrq completely
1 - enable all functions of sysrq
>1 - bitmask of allowed sysrq functions (see below for detailed function description):
    2 - enable control of console logging level
    4 - enable control of keyboard (SAK, unraw)
    8 - enable debugging dumps of processes etc.
    16 - enable sync command
    32 - enable remount read-only
    64 - enable signalling of processes (term, kill, oom-kill)
    128 - allow reboot/poweroff
    176 - allow only sync, reboot and "remount read-only"
    256 - allow nicing of all RT tasks 
```


# /etc/sysctl.d/10-magic-sysrq.conf    

was set to 

```

# The magic SysRq key enables certain keyboard combinations to be
# interpreted by the kernel to help with debugging. The kernel will respond
# to these keys regardless of the current running applications.
#
# In general, the magic SysRq key is not needed for the average Ubuntu
# system, and having it enabled by default can lead to security issues on
# the console such as being able to dump memory or to kill arbitrary
# processes including the running screen lock.
#
# Here is the list of possible values:
#   0 - disable sysrq completely
#   1 - enable all functions of sysrq
#  >1 - enable certain functions by adding up the following values:
#          2 - enable control of console logging level
#          4 - enable control of keyboard (SAK, unraw)
#          8 - enable debugging dumps of processes etc.
#         16 - enable sync command
#         32 - enable remount read-only
#         64 - enable signalling of processes (term, kill, oom-kill)
#        128 - allow reboot/poweroff
#        256 - allow nicing of all RT tasks
#
#   For example, to enable both control of console logging level and
#   debugging dumps of processes: kernel.sysrq = 10
#
kernel.sysrq = 176
```

You can set the value in the file by the following command.

echo "number" >/proc/sys/kernel/sysrq
So to fully enable it would be.

echo "1" > /proc/sys/kernel/sysrq
Or also can enable it by doing.

sysctl -w kernel.sysrq=1  
Note.
The value of /proc/sys/kernel/sysrq influences only the invocation via a keyboard. Invocation of any operation via /proc/sysrq-trigger is always allowed (by a user with admin privileges-see below).



1.3 How do I use the magic SysRq key?

Ubuntu Desktop

You press the key combo Alt + SysRq + command key.

N.B.- See the notes in this section and in the Troubleshooting section for other possible default settings for other systems and keyboards.

It is possible to set any character of your choosing:All Architectures

Write a character to /proc/sysrq-trigger:

echo t > /proc/sysrq-trigger
would set the T behave as SysRq
Note.



1.4 What are the 'command' keys?

'b' - Will immediately reboot the system without syncing or unmounting your disks.
'c' - Will perform a kexec reboot in order to take a crashdump.
'd' - Shows all locks that are held.
'e' - Send a SIGTERM to all processes, except for init.
'f' - Will call oom_kill to kill a memory hog process.
'g' - Used by kgdb on ppc and sh platforms.
'h' - Will display help (any key that is not listed here will bring forth help )
'i' - Send a SIGKILL to all processes, except for init.
'k' - Secure Access Key (SAK) Kills all programs on the current virtual terminal.  
Note.
See important comments below in SAK section.

'l' - Shows a stack backtrace for all active CPUs.
'm' - Will dump current memory info to your console.
'n' - Used to make RT tasks nice-able
'o' - Will shut your system off (if configured and supported).
'p' - Will dump the current registers and flags to your console.
'q' - Will dump a list of all running timers.
'r' - Turns off keyboard raw mode and sets it to XLATE.
's' - Will attempt to sync all mounted filesystems.
't' - Will dump a list of current tasks and their information to your console.
'u' - Will attempt to remount all mounted filesystems read-only.
'v' - Dumps Voyager SMP processor info to your console.
'w' - Dumps tasks that are in uninterruptable (blocked) state.
'x' - Used by xmon interface on ppc/powerpc platforms.
'0'-'9' - Sets the console log level, controlling which kernel messages will be printed to your console. ('0', for example would make it so that only emergency messages like PANICs or OOPSes would make it to your console.) 
1.5 Okay, so what can I use them for?

Unraw is very handy when your X server or a svgalib program crashes.

Sak (Secure Access Key) is useful when you want to be sure there is no trojan program running at console which could grab your password when you would try to login. It will kill all programs on given console, thus letting you make sure that the login prompt you see is actually the one from init, not some trojan program. Others find it useful as (System Attention Key) which is useful when you want to exit a program that will not let you switch consoles. (For example, X or a svgalib program.)
Note.
In its true form it is not a true SAK like the one in a c2 compliant system, and it should not be mistaken as such.

Reboot is good when you're unable to shut down.
Note.
It's general considered a good practice to umount first

Crashdump can be used to manually trigger a crashdump when the system is hung.
Note.
The kernel needs to have been built with CONFIG_KEXEC enabled!

Sync is great when your system is locked up, it allows you to sync your disks and will certainly lessen the chance of data loss and fscking.
Warning
The sync hasn't taken place until you see the "OK" and "Done" appear on the screen. (If the kernel is really in strife, you may not ever get the OK or Done message.

Umount is basically useful in the same ways as Sync.

The loglevels 0-9 are useful when your console is being flooded with kernel messages you do not want to see. Selecting 0 will prevent all but the most urgent kernel messages from reaching your console.
Note.
They will still be logged if syslogd/klogd are alive

Term and kill are useful if you have some sort of runaway process you are unable to kill any other way, especially if it's spawning other processes.
Note.
When experiencing bad kernel panic do Alt+Sysrq+e then Alt+Sysrq+u then Alt+Sysrq+i and finally Alt+Sysrq+b

1.6 Troubleshoot

1.6.1 Hanging before initscripts get run

If the machine is hanging before the initscripts get to run, boot with sysrq_always_enabled=1

1.6.2 Sometimes SysRq seems to get 'stuck' after using it, what can I do?

Tapping shift, alt, and control on both sides of the keyboard, and hitting an invalid sysrq sequence again will fix the problem. (i.e., something like alt+sysrq+z).

Switching to another virtual console (Ctrl+Alt+Fn1-Fn6) and then back again Ctrl+Alt+Fn7 should also help.

1.6.3 I hit SysRq, but nothing seems to happen, what's wrong?

There are some keyboards that send different scancodes for SysRq than the pre-defined 0x54. So if SysRq doesn't work out of the box for a certain keyboard, run showkey -s to find out the proper scancode sequence. Then use setkeycodes <sequence> 84 to define this sequence to the usual SysRq code (84 is decimal for 0x54). It's probably best to put this command in a boot script.
Warning
You exit showkey by not typing anything for ten seconds.

1.6.4 I want to add SysRq key events to a module, how does it work?

In order to register a basic function with the table, you must first include the header include/linux/sysrq.h, this will define everything else you need. Next, you must create a sysrq_key_op struct, and populate it with...

The key handler function you will use.

A help_msg string, that will print when SysRQ prints help

An action_msg string, that will print right before your handler is called. Your handler must conform to the prototype in 'sysrq.h'

After the sysrq_key_op is created, you can call the kernel function register_sysrq_key(int key, struct sysrq_key_op *op_p); this will register the operation pointed to by 'op_p' at table key 'key', if that slot in the table is blank. At module unload time, you must call the function unregister_sysrq_key(int key, struct sysrq_key_op *op_p), which will remove the key op pointed to by 'op_p' from the key 'key', if and only if it is currently registered in that slot. This is in case the slot has been overwritten since you registered it.

The Magic SysRq system works by registering key operations against a key op lookup table, which is defined in 'drivers/char/sysrq.c'. This key table has a number of operations registered into it at compile time, but is mutable, and 2 functions are exported for interface to it the register_sysrq_key and unregister_sysrq_key. Of course, never ever leave an invalid pointer in the table. ie; when your module that called register_sysrq_key() exits, it must call unregister_sysrq_key() to clean up the sysrq key table entry that it used.
Note.
Null pointers in the table are always safe.

If for some reason you feel the need to call the handle_sysrq function from within a function called by handle_sysrq, you must be aware that you are in a lock (you are also in an interrupt handler, which means don't sleep!), so you must call __handle_sysrq_nolock instead.

1.6.5 Conclusion
Use Alt + SysRq + S and then U and then B to sync, attempt to remount all mounted filesystems and then reboot if needed. Without changing a thing to system files.
If Alt + SysRq + B does not reboot system it may be necessary to edit /etc/sysctl.d/10-magic-sysrq.conf in order to allow the attempt of applying Alt + SysRq + B (or/and O after editing /proc/sys/kernel/sysrq bitmask to enable the reboot and shutting down of the system by use of sysrq. You could do this by any of the methods described above.

1.6.6 APPENDIX: See also - http://ubuntuforums.org/showthread.php?t=617349 and https://www.kernel.org/doc/Documentation/sysrq.txt

For those with Apple MacBook keyboard troubles regarding sysrq see: https://help.ubuntu.com/community/AppleKeyboard and https://bugs.launchpad.net/mactel-support/+bug/262408

Relative interesting info-After watching 17 08 2013 episode of the BBC programme "Click" and the "cyberwarfare" article really caught my attention. The programme also have their own website Click if you can not watch the programme. FAWC



https://royal.pingdom.com/2012/08/13/troubleshooting-sysrq/
