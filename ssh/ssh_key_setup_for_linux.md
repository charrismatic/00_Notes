https://www.cyberciti.biz/faq/how-to-set-up-ssh-keys-on-linux-unix/

# How To Setup SSH Keys on a Linux / Unix System

in Categories[CentOS](https://www.cyberciti.biz/faq/category/centos/), [Cryptography](https://www.cyberciti.biz/faq/category/cryptography/), [Debian / Ubuntu](https://www.cyberciti.biz/faq/category/debian-ubuntu/), [Linux](https://www.cyberciti.biz/faq/category/linux/), [OpenBSD](https://www.cyberciti.biz/faq/category/openbsd/), [RedHat and Friends](https://www.cyberciti.biz/faq/category/redhat-and-friends/),[UNIX](https://www.cyberciti.biz/faq/category/unix/)

 

last updated April 28, 2017

[![img](https://www.cyberciti.biz/media/new/category/old/openbsd_logo_sm.png)](https://www.cyberciti.biz/faq/category/openbsd/)

I

- OpenSSH SSHD server
- OpenSSH ssh client and friends on Linux (Ubuntu, Debian, {Free,Open,Net}BSD, RHEL, CentOS, MacOS/OSX, AIX, HP-UX and co).

## What is a public key authentication?

OpenSSH server supports various authentication schema. The two most popular are as follows:

1. Passwords based authentication
2. Public key based authentication. It is an alternative security method to using passwords. This method is recommended on a VPS, cloud, dedicated or even home based server.

## How to set up SSH keys

Steps to setup secure ssh keys:

1. Create the key pair using ssh-keygen command.
2. Copy and install the public key using ssh-copy-id command.
3. Add yourself to sudo admin account.
4. Disable the password login for root account.

Let us see all steps in details.

## How do I set up public key authentication?

You must generate both a public and a private key pair. For example:

![Fig.01: Our sample setup](https://www.cyberciti.biz/media/new/faq/2014/03/ssh-welcome-setup.png)Fig.01: Our sample setup

- server1.cyberciti.biz – You store your public key on the remote hosts and you have an accounts on this Linux/Unix based server.
- client1.cyberciti.biz – Your private key stays on the desktop/laptop/ computer (or local server) you use to connect to server1.cyberciti.biz server. Do not share or give your private file to anyone.

In public key based method you can log into remote hosts and server, and transfer files to them, without using your account passwords. Feel free to replace server1.cyberciti.biz and client1.cyberciti.biz names with your actual setup. Enough talk, let’s set up public key authentication. Open the Terminal and type following commands if .ssh directory does not exists:

## #1: Create the key pair

On the computer (such as client1.cyberciti.biz), generate a key pair for the protocol.

Sample outputs:

```
Generating public/private rsa key pair.
Enter file in which to save the key (/Users/vivek/.ssh/id_rsa): 
Enter passphrase (empty for no passphrase): 
Enter same passphrase again: 
Your identification has been saved in /Users/vivek/.ssh/id_rsa.
Your public key has been saved in /Users/vivek/.ssh/id_rsa.pub.
The key fingerprint is:
80:5f:25:7c:f4:90:aa:e1:f4:a0:01:43:4e:e8:bc:f5 vivek@desktop01
The key's randomart image is:
+--[ RSA 2048]----+
| oo    ...+.     |
|.oo  .  .ooo     |
|o .o. . .o  .    |
| o ...+o.        |
|  o .=.=S        |
| .  .Eo .        |
|                 |
|                 |
|                 |
+-----------------+

```

You need to set the Key Pair location and name. I recommend you use the default location if you do not yet have another key there, for example: $HOME/.ssh/id_rsa. You will be prompted to supply a passphrase (password) for your private key. I suggest that you setup a passphrase when prompted. You should see two new files in $HOME/.ssh/ directory:

1. $HOME/.ssh/id_rsa– contains your private key.
2. $HOME/.ssh/id_rsa.pub – contain your public key.

### Optional syntax for advance users

The following syntax specifies the 4096 of bits in the RSA key to creation (default 2048):
`$ ssh-keygen -t rsa -b 4096 -f ~/.ssh/vps-cloud.web-server.key -C "My web-server key"`
Where,

- **-t rsa** : Specifies the type of key to create. The possible values are “rsa1” for protocol version 1 and “dsa”, “ecdsa”, “ed25519”, or “rsa” for protocol version 2.
- **-b 4096** : Specifies the number of bits in the key to create
- **-f ~/.ssh/vps-cloud.web-server.key** : Specifies the filename of the key file.
- **-C "My web-server key"** : Set a new comment.

## #2: Install the public key in remote server

Use scp or ssh-copy-id command to copy your public key file (e.g., $HOME/.ssh/id_rsa.pub) to your account on the remote server/host (e.g., nixcraft@server1.cyberciti.biz). To do so, enter the following command on your client1.cyberciti.biz:

OR just copy the public key in remote server as authorized_keys in ~/.ssh/ directory:

### A note about appending the public key in remote server

On some system ssh-copy-id command may not be installed, so use the following commands (when prompted provide the password for remote user account called vivek) to install and append the public key:

## #3: Test it (type command on client1.cyberciti.biz)

The syntax is:

Or copy a text file called foo.txt:

You will be prompted for a passphrase. To get rid of passphrase whenever you log in the remote host, try ssh-agent and ssh-add commands.

### What are ssh-agent and ssh-add, and how do I use them?

To get rid of a passphrase for the current session, add a passphrase to ssh-agent and you will not be prompted for it when using ssh or scp/sftp/rsync to connect to hosts with your public key. The syntax is as follows:

Type the ssh-add command to prompt the user for a private key passphrase and adds it to the list maintained by ssh-agent command:

Enter your private key passphrase. Now try again to log into user@server1.cyberciti.biz and you will not be prompted for a password:

## #4: Disable the password based login on a server

Login to your server, type:

```
## client commands ##
eval $(ssh-agent)
ssh-add
ssh user@server1.cyberciti.biz

```

Edit /etc/ssh/sshd_config on server1.cyberciti.biz using a text editor such as nano or vim:

**Warning**: Make sure you add yourself to sudoers files. Otherwise you will not able to login as root later on. See “[How To Add, Delete, and Grant Sudo Privileges to Users on a FreeBSD Server](https://www.cyberciti.biz/faq/how-to-add-delete-grant-sudo-privileges-to-users-on-freebsd-unix-server/)” for more info.

`$ sudo vim /etc/ssh/sshd_config`
OR [directly jump to PermitRootLogin line](https://www.cyberciti.biz/faq/linux-unix-command-open-file-linenumber-function/) using a vim text editor:
`$ sudo vim +/PermitRootLogin /etc/ssh/sshd_config`
Find PermitRootLogin and set it as follows:

Save and close the file. I am [going to add a user named vivek to sudoers on Ubuntu Linux](https://www.cyberciti.biz/faq/how-to-create-a-sudo-user-on-ubuntu-linux-server/):
`# adduser vivek`
Finally, [reload/restart the sshd server](https://www.cyberciti.biz/faq/howto-restart-ssh/), type command as per your Linux/Unix version:

## #5: How to add or replace a passphrase for an existing private key?

To [to change your passphrase type the following command](https://www.cyberciti.biz/faq/howto-ssh-changing-passphrase/):
`ssh-keygen -p`

## #6: How to backup an existing private/public key?

Just copy files to your backup server or external USB pen/hard drive:

## How do I protect my ssh keys

1. Always use a strong passphrase.
2. Do not share your private keys anywhere online or store in insecure cloud storage.
3. Restrict privileges of the account.

## How do I create and setup an OpenSSH config file to create shortcuts for servers I frequently access?

See [how to create and use an OpenSSH ssh_config file for more](https://www.cyberciti.biz/faq/create-ssh-config-file-on-linux-unix/) info.

##### See also

- [keychain: Set Up Secure Passwordless SSH Access For Backup Scripts](https://www.cyberciti.biz/faq/ssh-passwordless-login-with-keychain-for-scripts/)
- [Ubuntu / Debian Linux Server Install Keychain SSH Key Manager For OpenSSH](https://www.cyberciti.biz/faq/ubuntu-debian-linux-server-install-keychain-apt-get-command/)
- Man pages – ssh(1),ssh-agent(1),ssh-add(1),ssh-keygen(1)

And, there you have it, ssh set up with public key based authentication for Linux or Unix-like systems.