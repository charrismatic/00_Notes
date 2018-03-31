# SSH File Permissions

__Private Key__

Your private key (`id_rsa`) should be `600 (-rw-------)`

```shell
sudo chmod 600 ~/.ssh/id_rsa
```

__Public Key__

The public key (`.pub` file) to be `644 (-rw-r--r--)`. 

```shell
sudo chmod 644 ~/.ssh/id_rsa.pub
```

__~/.ssh__  

Typically you want the `.ssh` directory permissions to be `700 (drwx------)` 

__Home Directory__

Your home directory should not be writeable by the group or others (at most `755 (drwxr-xr-x)`).

```shell
chmod go-w /home/$USER
```

OR

```shell
chmod 755 /home/$USER
```



__SERVER SETUP__

- Server SSH folder needs 700 permissions: `chmod 700 /home/$USER/.ssh`
- Authorized_keys file needs 644 permissions: `chmod 644 /home/$USER/.ssh/authorized_keys`
- Make sure that `user` owns the files/folders and not `root`: `chown user:user authorized_keys` and `chown user:user /home/$USER/.ssh`
- Put the generated public key (from `ssh-keygen`) in the user's `authorized_keys` file on the server




### REFERENCES:

https://superuser.com/questions/215504/permissions-on-private-key-in-ssh-folder

Secure Secure Shell: https://stribika.github.io/2015/01/04/secure-secure-shell.html

Ubuntu Community Post SSH/OpenSSH/Keys: https://help.ubuntu.com/community/SSH/OpenSSH/Keys

Keygen Best Practices: https://security.stackexchange.com/questions/143442/ssh-keygen-best-practices