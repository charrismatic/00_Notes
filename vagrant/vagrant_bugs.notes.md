

# scotch/box 

## SSH FAILS USING SCOTCH/BOX

Issue: https://github.com/scotch-io/scotch-box/issues/309

You see the following message over and over in a loop
```
default: Warning: Connection reset. Retrying...
default: Warning: Remote connection disconnect. Retrying...
```

To fix this you need to add the ssh user credentials to the Vagrant file.

```
config.ssh.username = "vagrant"
config.ssh.password = "vagrant"
```
