https://askubuntu.com/questions/904628/default-17-04-swap-file-location



22[down vote]()accepted

2 commands:

```
~$ cat /proc/swaps
Filename                Type        Size    Used    Priority
/swapfile                               file        2097148 0   -1

```

and

```
$ grep swap /etc/fstab
/swapfile                                 none            swap    sw              0       0

```

So both point to:

```
$ cd / && ls -l swapfile
-rw------- 1 root root 2147483648 apr  2 18:56 swapfile

```

------

Disable and remove:

```
sudo swapoff /swapfile
sudo rm /swapfile

```

------

Create a 2Gb swapfile, set permissions, format it as swap and enable it:

```
sudo fallocate -l 2g /swapfile
sudo chmod 600 /swapfile
sudo mkswap /swapfile
sudo swapon /swapfile

```



returns: 

```
Setting up swapspace version 1, size = 8 GiB (8589930496 bytes)
no label, UUID=4f94b3a3-e787-4fec-9eb7-61ec0eab81de

```