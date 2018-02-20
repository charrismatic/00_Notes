# Virtualbox

Reinstall virtualbox packages

```shell
sudo dpkg-reconfigure virtualbox-dkms && sudo dpkg-reconfigure virtualbox && sudo modprobe vboxdrvvboxconfig
```



Rebuild modules and symlinks

```sudo /sbin/vboxconfig```

