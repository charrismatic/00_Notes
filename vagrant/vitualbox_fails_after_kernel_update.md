# libvirt-daemonVirtualbox

## 1. TRY: Rebuild modules and symlinks

```shell
sudo /sbin/vboxconfig
```

```
sudo dpkg-reconfigure virtualbox-dkms
modprobe vboxdrv
```



## 2. FALLBACK: Reinstall virtualbox packages

```shell
sudo dpkg-reconfigure virtualbox-dkms && sudo dpkg-reconfigure virtualbox && sudo modprobe vboxdrv
```

source: https://askubuntu.com/questions/819939/virtualbox-fails-after-kernel-update



## 3. START OVER: UNINSTALL COMPLETELY 

```shell
sudo dpkg --purge virtualbox virtualbox-5.2 virtualbox-dkms virtualbox-qt	
```



Goto https://download.virtualbox.org/virtualbox/debian/pool/contrib/v/virtualbox-5.2/ and download again

sudo apt-get install virtualbox-5.2 virtualbox-dkms virtualbox-ext-pack virtualbox-guest-additions-iso





Notes: 

- https://github.com/hashicorp/vagrant
- https://github.com/hashicorp/vagrant/releases