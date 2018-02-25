# Virtualbox

1. Reinstall virtualbox packages

```shell
sudo dpkg-reconfigure virtualbox-dkms && sudo dpkg-reconfigure virtualbox && sudo modprobe vboxdrvvboxconfig
```



2. Rebuild modules and symlinks

```sudo /sbin/vboxconfig```

