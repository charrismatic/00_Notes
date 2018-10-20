dd if=/dev/zero of=/swap/swapfs_01 bs=1024 count=2097152
dd if=/dev/zero of=/swap/swapfs_02 bs=1024 count=2097152
dd if=/dev/zero of=/swap/swapfs_03 bs=1024 count=2097152

chmod 0600 /swap/swapfs_*

mkswap --label swap1 /swap/swapfs_01
mkswap --label swap2 /swap/swapfs_02
mkswap --label swap3 /swap/swapfs_03

#LABEL=swap1, UUID=5e16fb3c-bb79-45de-88ba-4f41f9a5de60
#LABEL=swap2, UUID=948bfda5-91d8-4f35-a386-7ff4f3e7684a
#LABEL=swap3, UUID=b8e42171-d9b8-4fb4-afba-3a2854b355bb

swapon -o pri=10000 /swap/swapfs_01
swapon -o pri=1000 /swap/swapfs_02
swapon -o pri=100 /swap/swapfs_03


#/etc/fstab 
```
/swap/swapfs_01                                 none            swap    sw,pri=10000                0  0
/swap/swapfs_02                                 none            swap    sw,pri=1000                 0  0
/swap/swapfs_03                                 none            swap    sw,pri=100                  0  0
```


# To change the swappiness value edit /etc/sysctl.conf and add the following line.
```
vm.swappiness=10
```
