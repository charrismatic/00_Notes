__User Config File Location__

`~/.ssh/config`  | `/home/$USER/.ssh/config`

### Config File Template

```shell
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
	ServerAliveCountMax 1
```



__Optional Settings__

