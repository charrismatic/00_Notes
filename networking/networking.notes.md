
FIND WHO IS LISTENING ON WHICH PORT
netstat -luntap | grep LISTEN



Rename a Linux network interface without Udev / Reboot
If you want to rename a network interface on Linux in an interactive manner without Udev and/or rebooting the machine, you can just do the following:
ref: https://www.cyberciti.biz/faq/howto-linux-rename-ethernet-devices-named-using-udev/

: ifconfig peth0 down
: ip link set peth0 name eth0
: ifconfig eth0 up

###
See you ip neighborhood
ip neigh
192.168.1.133 dev wlx2c4d54ce4ef7 lladdr 78:dd:08:b9:5d:fd REACHABLE
192.168.1.1 dev wlx2c4d54ce4ef7 lladdr 60:31:97:04:68:b2 REACHABLE
192.168.1.122 dev wlx2c4d54ce4ef7 lladdr 6c:0b:84:03:6c:fd STALE
192.168.1.135 dev wlx2c4d54ce4ef7 lladdr bc:85:56:b0:ed:07 STALE
