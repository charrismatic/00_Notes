

https://www.cyberciti.biz/tips/linux-swap-space.html

# Linux: Should You Use Twice the Amount of Ram as Swap Space?

in Categories[data center](https://www.cyberciti.biz/tips/category/data-center), [Debian Linux](https://www.cyberciti.biz/tips/category/debian-linux), [fedora linux](https://www.cyberciti.biz/tips/category/fedora-linux), [File system](https://www.cyberciti.biz/tips/category/file-system), [FreeBSD](https://www.cyberciti.biz/tips/category/freebsd), [Gentoo Linux](https://www.cyberciti.biz/tips/category/gentoo-linux),[kernel](https://www.cyberciti.biz/tips/category/kernel), [Linux](https://www.cyberciti.biz/tips/category/linux), [Linux desktop](https://www.cyberciti.biz/tips/category/linux-desktop), [Linux laptop](https://www.cyberciti.biz/tips/category/linux-laptop), [OpenBSD](https://www.cyberciti.biz/tips/category/openbsd), [RedHat/Fedora Linux](https://www.cyberciti.biz/tips/category/redhatfedora-linux), [Solaris](https://www.cyberciti.biz/tips/category/solaris),[Storage](https://www.cyberciti.biz/tips/category/storage), [Suse Linux](https://www.cyberciti.biz/tips/category/suse-linux), [Tuning](https://www.cyberciti.biz/tips/category/tuning), [Ubuntu Linux](https://www.cyberciti.biz/tips/category/ubuntu-linux), [UNIX](https://www.cyberciti.biz/tips/category/unix)

 

last updated June 8, 2017

[![img](https://www.cyberciti.biz/media/new/category/old/file-manager.png)](https://www.cyberciti.biz/tips/category/file-system)

Linux and other Unix-like operating systems use the term “[swap](https://en.wikipedia.org/wiki/Paging)” to describe both the act of moving memory pages between RAM and disk and the region of a disk the pages are stored on. It is common to use a whole partition of a hard disk for swapping. However, with the 2.6 Linux kernel, swap files are just as fast as swap partitions. Now, many admins (both Windows and Linux/UNIX) follow an old rule of thumb that your swap partition should be twice the size of your main system RAM. Let us say I’ve 32GB RAM, should I set swap space to 64 GB? Is 64 GB of swap space required? How big should your Linux / UNIX swap space be?

## Old dumb memory managers

I think the ‘2x swap space’ rule came from Old Solaris and Windows admins. Also, earlier memory managers were very badly designed. There were not very smart. Today, we have very smart and intelligent memory manager for both Linux and UNIX.

## Nonsense rule: Twice the size of your main system RAM for Servers

According to [OpenBSD FAQ](https://www.openbsd.org/faq/faq4.html):

> Many people follow an old rule of thumb that your swap partition should be twice the size of your main system RAM. This rule is nonsense. On a modern system, that’s a LOT of swap, most people prefer that their systems never swap. You don’t want your system to ever run out of RAM+swap, but you usually would rather have enough RAM in the system so it doesn’t need to swap.

## Select right size for your setup

Here is my rule for normal server (Web / Mail etc):

1. Swap space == Equal RAM size (if RAM < 2GB)
2. Swap space == 2GB size (if RAM > 2GB)

My friend who is a true Oracle GURU recommends something as follows for heavy duty Oracle server with fast storage such as [RAID 10](https://www.cyberciti.biz/tips/raid5-vs-raid-10-safety-performance.html):

1. Swap space == Equal RAM size (if RAM < 8GB)
2. Swap space == 0.50 times the size of RAM (if RAM > 8GB)

### Red Hat Recommendation

Red hat recommends setting as follows for RHEL 5/6:

> The reality is the amount of swap space a system needs is not really a function of the amount of RAM it has but rather the memory workload that is running on that system. A Red Hat Enterprise Linux 5 system will run just fine with no swap space at all as long as the sum of anonymous memory and system V shared memory is less than about 3/4 the amount of RAM. In this case the system will simply lock the anonymous and system V shared memory into RAM and use the remaining RAM for caching file system data so when memory is exhausted the kernel only reclaims pagecache memory.
>
> Considering that 1) At installation time when configuring the swap space there is no easy way to predetermine the memory a workload will require, and 2) The more RAM a system has the less swap space it typically needs, a better swap space

1. Systems with 4GB of ram or less require a minimum of 2GB of swap space
2. Systems with 4GB to 16GB of ram require a minimum of 4GB of swap space
3. Systems with 16GB to 64GB of ram require a minimum of 8GB of swap space
4. Systems with 64GB to 256GB of ram require a minimum of 16GB of swap space

**CentOS Linux 7.x and RHEL 7 **recommends the following rules:

[![Fig.01: Recommended System Swap Space For Linux](https://www.cyberciti.biz/images/misc/tips/recommended-system-swap-space.png)](https://www.cyberciti.biz/images/misc/tips/recommended-system-swap-space.png)Fig.01: Recommended System Swap Space For Linux

### Swap will just keep running servers…

Swap space will just keep operation running for a while on heavy duty servers by swapping process. You can always [find out swap space utilization using any one of the following command](https://www.cyberciti.biz/faq/linux-check-swap-usage-command/):
`cat /proc/swapsswapon -sfree -mtop`
See how to [find out disk I/O and related](https://www.cyberciti.biz/tips/linux-disk-performance-monitoring-howto.html) information under Linux. In the end, you need to **add more RAM, adjust software** (like controlling Apache workers or using [lighttpd web server](https://www.cyberciti.biz/faq/category/lighttpd/) to save RAM) or use some sort of **load balancing**.

You can rfer Linux kernel documentation for [/proc/sys/vm/swappiness to fine tune swap space](https://www.cyberciti.biz/faq/linux-kernel-tuning-virtual-memory-subsystem/). It is also [possible to add a swap space on Linux](https://www.cyberciti.biz/faq/linux-add-a-swap-file-howto/) without creating a new partitions.

#### A NOTE ABOUT DESKTOP AND LAPTOP

If you are going to [suspend to disk](https://www.cyberciti.biz/faq/linux-suspend-hibernate-functionality-support/), then you need swap space more than actual RAM. For example, my laptop has 1GB RAM and swap is setup to 2GB. This only applies to Laptop or desktop but not to servers.

#### KERNEL HACKERS NEED MORE SWAP SPACE

If you are a kernel hacker (debugging and fixing kernel issues) and generating core dumps, you need twice the RAM swap space.

## Conclusion

If Linux kernel is going to use more than 2GiB swap space at a time, all users will feel the heat. Either, you get more RAM (recommend) and move to faster storage to improve disk I/O. There are no rules, each setup and configuration is unique. Adjust values as per your requirements. Select amount of swap that is right for you.

What do you think? Please add your thoughts about ‘swap space’ in the comments below.





https://www.cyberciti.biz/faq/linux-kernel-tuning-virtual-memory-subsystem/





# Linux Tuning The VM (memory) Subsystem

in Categories[BASH Shell](https://www.cyberciti.biz/faq/category/bash-shell/), [CentOS](https://www.cyberciti.biz/faq/category/centos/), [Debian / Ubuntu](https://www.cyberciti.biz/faq/category/debian-ubuntu/), [Linux](https://www.cyberciti.biz/faq/category/linux/), [RedHat and Friends](https://www.cyberciti.biz/faq/category/redhat-and-friends/), [Suse](https://www.cyberciti.biz/faq/category/suse/),[Troubleshooting](https://www.cyberciti.biz/faq/category/troubleshooting/), [Ubuntu Linux](https://www.cyberciti.biz/faq/category/ubuntu-linux/), [Virtualization](https://www.cyberciti.biz/faq/category/virtualization/)

 

last updated October 16, 2009

[![img](https://www.cyberciti.biz/media/new/category/old/linux-logo.png)](https://www.cyberciti.biz/faq/category/linux/)

I‘ve fast RAID-10 disk subsystem with multiple SCSI disks. Apps running under modern Linux kernel don’t write directly to the disk. They write it to the file system cache which is managed by Linux kernel virtual memory manager. Since I’ve high performance RAID controller I need to decrease the number of flushes. How do I tune virtual memory subsystem under Linux operating systems for better performance?
Linux allows you to tune the VM subsystem. However, tuning the memory subsystem is a challenging task. Wrong settings can affect the overall performance of your system. I suggest you modify one setting at a time and monitor your system for sometime. If performance increased keep the settings else revert back.

## Say Hello To /proc/sys/vm

The files in this directory can be used to tune the operation of the virtual memory (VM) subsystem of the Linux kernel:
`cd /proc/sys/vmls -l`
Sample outputs:

```
total 0
-rw-r--r-- 1 root root 0 Oct 16 04:21 block_dump
-rw-r--r-- 1 root root 0 Oct 16 04:21 dirty_background_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 dirty_expire_centisecs
-rw-r--r-- 1 root root 0 Oct 16 04:21 dirty_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 dirty_writeback_centisecs
-rw-r--r-- 1 root root 0 Oct 16 04:21 drop_caches
-rw-r--r-- 1 root root 0 Oct 16 04:21 flush_mmap_pages
-rw-r--r-- 1 root root 0 Oct 16 04:21 hugetlb_shm_group
-rw-r--r-- 1 root root 0 Oct 16 04:21 laptop_mode
-rw-r--r-- 1 root root 0 Oct 16 04:21 legacy_va_layout
-rw-r--r-- 1 root root 0 Oct 16 04:21 lowmem_reserve_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 max_map_count
-rw-r--r-- 1 root root 0 Oct 16 04:21 max_writeback_pages
-rw-r--r-- 1 root root 0 Oct 16 04:21 min_free_kbytes
-rw-r--r-- 1 root root 0 Oct 16 04:21 min_slab_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 min_unmapped_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 mmap_min_addr
-rw-r--r-- 1 root root 0 Oct 16 04:21 nr_hugepages
-r--r--r-- 1 root root 0 Oct 16 04:21 nr_pdflush_threads
-rw-r--r-- 1 root root 0 Oct 16 04:21 overcommit_memory
-rw-r--r-- 1 root root 0 Oct 16 04:21 overcommit_ratio
-rw-r--r-- 1 root root 0 Oct 16 04:21 pagecache
-rw-r--r-- 1 root root 0 Oct 16 04:21 page-cluster
-rw-r--r-- 1 root root 0 Oct 16 04:21 panic_on_oom
-rw-r--r-- 1 root root 0 Oct 16 04:21 percpu_pagelist_fraction
-rw-r--r-- 1 root root 0 Oct 16 04:21 swappiness
-rw-r--r-- 1 root root 0 Oct 16 04:21 swap_token_timeout
-rw-r--r-- 1 root root 0 Oct 16 04:21 vfs_cache_pressure
-rw-r--r-- 1 root root 0 Oct 16 04:21 zone_reclaim_mode
```

### pdflush

Type the following command to see current wake up time of pdflush:
`# sysctl vm.dirty_background_ratio`
Sample outputs:

```
sysctl vm.dirty_background_ratio = 10
```

vm.dirty_background_ratio contains 10, which is a percentage of total system memory, the number of pages at which the pdflush background writeback daemon will start writing out dirty data. However, for fast RAID based disk system this may cause large flushes of dirty memory pages. If you increase this value from 10 to 20 (a large value) will result into less frequent flushes:
`# sysctl -w vm.dirty_background_ratio=20`

### swappiness

Type the following command to see current default value:
`# sysctl vm.swappiness`
Sample outputs:

```
vm.swappiness = 60
```

The value 60 defines how aggressively memory pages are swapped to disk. If you do not want swapping, than lower this value. However, if your system process sleeps for a long time you may benefit with an aggressive swapping behavior by increasing this value. For example, you can change swappiness behavior by increasing or decreasing the value:

```
# sysctl -w vm.swappiness=100
```

### dirty_ratio

Type the following command:
`# sysctl vm.dirty_ratio`
Sample outputs:

```
vm.dirty_ratio = 40
```

The value 40 is a percentage of total system memory, the number of pages at which a process which is generating disk writes will itself start writing out dirty data. This is nothing but the ratio at which dirty pages created by application disk writes will be flushed out to disk. A value of 40 mean that data will be written into system memory until the file system cache has a size of 40% of the server’s RAM. So if you’ve 12GB ram, data will be written into system memory until the file system cache has a size of 4.8G. You change the dirty ratio as follows:
`# sysctl -w vm.dirty_ratio=25`

### Making Changes To VM Permanently

You need to add the settings to /etc/sysctl.conf. See our previous FAQ [making changes to /proc filesystem](https://www.cyberciti.biz/faq/making-changes-to-proc-filesystem-permanently/) permanently.

#### REFERENCES:

1. [The /proc filesystem](https://www.cyberciti.biz/files/linux-kernel/Documentation/filesystems/proc.txt)

2. ​