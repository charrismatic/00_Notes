https://www.cyberciti.biz/faq/ssh-passwordless-login-with-keychain-for-scripts/



# keychain: Set Up Secure Passwordless SSH Access For Backup Scripts on Linux

in Categories[CentOS](https://www.cyberciti.biz/faq/category/centos/), [Debian / Ubuntu](https://www.cyberciti.biz/faq/category/debian-ubuntu/), [FreeBSD](https://www.cyberciti.biz/faq/category/freebsd/), [Linux](https://www.cyberciti.biz/faq/category/linux/), [OpenBSD](https://www.cyberciti.biz/faq/category/openbsd/), [RedHat and Friends](https://www.cyberciti.biz/faq/category/redhat-and-friends/),[Security](https://www.cyberciti.biz/faq/category/security/), [Suse](https://www.cyberciti.biz/faq/category/suse/), [UNIX](https://www.cyberciti.biz/faq/category/unix/)

 

last updated December 4, 2017

[![img](https://www.cyberciti.biz/media/new/category/old/openbsd_logo_sm.png)](https://www.cyberciti.biz/faq/category/openbsd/)

W

## How does keychain make it better than a keyless passphrase?

If an attacker manages to log into the server with passphrase-free keys, all other your servers/workstation on which keys used are also the security risk. With keychain or ssh-agent attacker will not be able to touch your remote systems without breaking your passphrase. Another example, if your laptop or hard disk stolen, an attacker can simply copy your key and use it anywhere as a passphrase does not protect it.

The keychain act as a manager for ssh-agent, typically run from ~/.bash_profile. It allows your shells and cron jobs to share a single ssh-agent process. By default, the ssh-agent started by keychain is long-running and will continue to run, even after you have logged out from the system. If you want to change this behavior, take a look at the --clear and --timeout options, described below. Our sample setup is as follows:

```
peerbox.nixcraft.net.in => Remote Backup Server. Works in pull only mode. It will backup server1.nixcraft.net.in and server2.nixcraft.net.in.
vivek-desktop.nixcraft.net.in => My desktop computer.
server1.nixcraft.net.in => General purpose remote server.
server2.nixcraft.net.in => General purpose remote web / mail / proxy server.

```

You need to install keychain software on peerbox.nixcraft.net.in so that you or scripts can log in securely to other two servers for backup.

## Install keychain on CentOS / RHEL / Fedora Linux

RHEL/CentOS Linux user type the following command to first enable psychotic repo and install keychain package on CentOS 7.x:
`##[*** Install psychotic repo **]##$ sudo rpm --import http://wiki.psychotic.ninja/RPM-GPG-KEY-psychotic$ sudo rpm -ivh http://packages.psychotic.ninja/6/base/i386/RPMS/psychotic-release-1.0.0-1.el6.psychotic.noarch.rpm##[*** install keychain from psychotic repo **]##$ sudo yum --enablerepo=psychotic install keychain`
Sample outputs:

Fedora Linux user type:
`$ sudo dnf install keychain`

## Install keychain on Debian / Ubuntu Linux

To add the package:
`$ sudo apt-get update$ sudo apt-get install keychain`
Sample outputs:

## Install keychain on FreeBSD

To install the port:
`# cd /usr/ports/security/keychain/ && make install clean`
To add the package use pkg as follows:
`# pkg install keychain`

## Install keychain on OpenBSD

To add the package use pkg_add as follows:
`# pkg_add -v keychain`

## How do I setup SSH keys with passphrase?

Simply [type the following commands](https://www.cyberciti.biz/faq/how-to-set-up-ssh-keys-on-linux-unix/):
`$ ssh-keygen -t rsa`
OR
`$ ssh-keygen -t dsa`
Assign the pass phrase when prompted. See the following step-by-step guide for detailed information:

1. Howto [Linux / UNIX setup SSH with DSA](https://www.cyberciti.biz/faq/ssh-password-less-login-with-dsa-publickey-authentication/) public key authentication (password less login)
2. Howto use [multiple SSH keys for password](https://www.cyberciti.biz/tips/linux-multiple-ssh-key-based-authentication.html) less login

## How do I Use keychain?

Once OpenSSH keys are configured with a pass phrase, update your $HOME/.bash_profile file which is your personal initialization file, executed for login BASH shells:
`$ vi $HOME/.bash_profile`
Append the following code:

Now you’ve keychanin configured to call keychain tool every login. Just log out and log back in to server from your desktop to test your setup:
`$ ssh root@www03.nixcraft.net.in`
Sample Output:

[![Fig.01 - Keychain in Action](https://www.cyberciti.biz/media/new/faq/2009/06/keychain.png)](https://www.cyberciti.biz/faq/ssh-passwordless-login-with-keychain-for-scripts/keychain/)Fig.01 - Keychain in Action

```
# scp $HOME/.ssh/id_dsa.pub server1.nixcraft.net.in:~/pubkey
# scp $HOME/.ssh/id_dsa.pub server2.nixcraft.net.in:~/pubkey
# ssh server1.nixcraft.net.in cat ~/pubkey >> ~/.ssh/authorized_keys2; rm ~/pubkey
# ssh server2.nixcraft.net.in cat ~/pubkey >> ~/.ssh/authorized_keys2; rm ~/pubkey
# ssh root@server1.nixcraft.net.in
# ssh user@server2.nixcraft.net.in
```

## Task: Clear or delete all of ssh-agent’s keys

`# keychain --clear`

## Security Task: Make sure intruder cannot use your existing ssh-agent’s keys (only allow cron jobs to use password less login)

The idea is pretty simply only allow backup shell scripts and other cron jobs to allow password-less login but all users including an intruder must provide a passphrase key for interactive login. It is done by deleting all of ssh-agent’s keys. This option will increase security, and it still allows your cron jobs to use your ssh keys when you are logged out. Update your ~/.bash_profile as follows:

If you are using RSA, use:

Now, just log in to remote server box once :
`$ ssh root@peerbox.nixcraft.net.in`
Log out (only grant access to cron jobs such as backup)
`# logout`

## Task: Use keychain with backup scripts for password-less login via cron job

Add the following before your rsync, tar over ssh, or any other network backup command:

Here is a sample rsync script:

If you are using rsnaphot backup server (see how to setup [RHEL / CentOS](https://www.cyberciti.biz/faq/redhat-cetos-linux-remote-backup-snapshot-server/) / [Debian rsnapshot](https://www.cyberciti.biz/faq/linux-rsnapshot-backup-howto/) backup server) add the following to your /etc/rsnapshot.conf file

## A note about keychain and security

- Cracker with an advanced attacking with deadly coding skills can still get key from memory. However, keychain makes it pretty difficult for normal users and attackers to steal your keys and use it.
- OpenSSH sshd server offers two additional options to protect abuse of keys. First, make sure root login disabled (**PermitRootLogin yes**). Second, specify which user accounts on the server are allowed to be used for authentication by adding **AuthorizedKeysFile %h/.ssh/authorized_keys_FileName**. See sshd_config man page for further details.

##### Suggested readings:

- man pages sshd, sshd_config, keychain
- [rsnapshot MySQL backup](https://bash.cyberciti.biz/backup/rsnapshot-remote-mysql-backup-shell-script/) script.
- The [OpenSSH project](https://www.openssh.com/) official website.
- The [Keychain project](http://www.funtoo.org/Keychain) official website.

 

7

 

 

7

 

 

Rsnapshot Filesystem Snapshot Tutorial

 

1. [FreeBSD Install Rsnapshot Backup Utility](https://www.cyberciti.biz/faq/howto-install-rsnapshot-filesystem-snapshot-backup-utility-in-freebsd/)
2. [Debian / Ubuntu Linux Install Rsnapshot Backup Utility](https://www.cyberciti.biz/faq/linux-rsnapshot-backup-howto/)
3. [How To Install Rsnapshot on a Red hat / CentOS Linux](https://www.cyberciti.biz/faq/redhat-cetos-linux-remote-backup-snapshot-server/)
4. [UNIX / Linux: Rsnapshot Restore Backups](https://www.cyberciti.biz/faq/restoring-backup-files-with-rsnapshot-unix-linux-bsd-appleosx/)
5. [Rsync: Preserve / Copy Hard Links ( Backup Rsnapshot Directory Tree )](https://www.cyberciti.biz/faq/linux-unix-apple-osx-bsd-rsync-copy-hard-links/)
6. [Rsnapshot WARNING: Could not lchown() symlink "/path/to/file" Error and Solution](https://www.cyberciti.biz/faq/warning-could-not-lchown/)
7. keychain: Set Up Secure Passwordless SSH Access For Backup Scripts