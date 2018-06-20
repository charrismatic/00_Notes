issues with Ubuntu 18  and systemd-resolve 

Note that the filesystem /etc/resolv.conf is a symlink and changing it causes it to be fixed as soon as you come bac



Recommended nameservers:

Router nameserver 192.168.1.1

Google DNS 8.8.8.8, 8.8.4.4

nameserver 184.170.172.131
nameserver 208.38.252.3



FILES
       /etc/dnsmasq.conf

       /usr/local/etc/dnsmasq.conf
    
       /etc/resolv.conf /var/run/dnsmasq/resolv.conf /etc/ppp/resolv.conf /etc/dhcpc/resolv.conf
    
       /etc/hosts
    
       /etc/ethers
    
       /var/lib/misc/dnsmasq.leases
    
       /var/db/dnsmasq.leases
    
       /var/run/dnsmasq.pid