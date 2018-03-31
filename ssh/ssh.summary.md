# SSH NOTES 



## CREATE SSH KEY

__ssh-keygen__

```shell
ssh-keygen -t rsa -b 4096 -o -a 100 -C user@host -f file_name_rsa_409
```



## SSH File Permissions

__CLIENT__

`Private_Key` 600

`Public_Key` 644

`/home/$USER/.ssh`  700

`/home/$USER` 755

__HOST__

`/home/$USER/.ssh` 700 

`authorized_keys` 644 

Make sure that `user` owns the files / folders and not `root`

Add `user` public key to `/home/user/.ssh/authorized_keys` file 

------

### SSH CONFIG  

```shell
# ~/.ssh/config 

Host local-computer
	Hostname 192.168.1.1
	User username
	RSAAuthentication yes
	IdentityFile ~/.ssh/ssh_id
	ServerAliveInterval 120
	ServerAliveCountMax 15

Host remote-server
	Hostname 192.168.1.122
	User username2
	IdentityFile ~/.ssh/ssh_id
	ServerAliveInterval 60
	ServerAliveCountMax 10
```





------

## SSH Key Management 



__ssh-add__

```
usage: ssh-add options

Options:
  -l          List fingerprints of all identities.
  -E hash     Specify hash algorithm used for fingerprints.
  -L          List public key parameters of all identities.
  -k          Load only keys and not certificates.
  -c          Require confirmation to sign using identities
  -t life     Set lifetime (in seconds) when adding identities.
  -d          Delete identity.
  -D          Delete all identities.
  -x          Lock agent.
  -X          Unlock agent.
  -s pkcs11   Add keys from PKCS#11 provider.
  -e pkcs11   Remove keys provided by PKCS#11 provider.

```





---

### REFERENCES:

https://superuser.com/questions/215504/permissions-on-private-key-in-ssh-folder

Secure Secure Shell: https://stribika.github.io/2015/01/04/secure-secure-shell.html

Ubuntu Community Post SSH/OpenSSH/Keys: https://help.ubuntu.com/community/SSH/OpenSSH/Keys

Keygen Best Practices: https://security.stackexchange.com/questions/143442/ssh-keygen-best-practices