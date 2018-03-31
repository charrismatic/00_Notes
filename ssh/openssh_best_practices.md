https://www.cyberciti.biz/tips/linux-unix-bsd-openssh-server-best-practices.html



# Top 20 OpenSSH Server Best Security Practices

in Categories[CentOS](https://www.cyberciti.biz/tips/category/centos), [Debian Linux](https://www.cyberciti.biz/tips/category/debian-linux), [fedora linux](https://www.cyberciti.biz/tips/category/fedora-linux), [FreeBSD](https://www.cyberciti.biz/tips/category/freebsd), [Gentoo Linux](https://www.cyberciti.biz/tips/category/gentoo-linux), [Howto](https://www.cyberciti.biz/tips/category/howto), [Linux](https://www.cyberciti.biz/tips/category/linux),[Networking](https://www.cyberciti.biz/tips/category/networking), [package management](https://www.cyberciti.biz/tips/category/package-management), [RedHat/Fedora Linux](https://www.cyberciti.biz/tips/category/redhatfedora-linux), [Security](https://www.cyberciti.biz/tips/category/security), [Suse Linux](https://www.cyberciti.biz/tips/category/suse-linux),[Sys admin](https://www.cyberciti.biz/tips/category/sys-admin), [Ubuntu Linux](https://www.cyberciti.biz/tips/category/ubuntu-linux), [UNIX](https://www.cyberciti.biz/tips/category/unix)

 

last updated January 18, 2018

![OpenSSH Security Tips](https://www.cyberciti.biz/media/new/tips/2009/07/openSSH_logo.png)

OpenSSH is the implementation of the SSH protocol. OpenSSH is recommended for remote login, making backups, remote file transfer via scp or sftp, and much more. SSH is perfect to keep confidentiality and integrity for data exchanged between two networks and systems. However, the main advantage is server authentication, through the use of public key cryptography. From time to time there are [rumors](https://isc.sans.edu/diary/OpenSSH+Rumors/6742) about OpenSSH zero day exploit. This **page shows how to secure your OpenSSH server running on a Linux or Unix-like system to improve sshd security**.

## OpenSSH defaults

- TCP port – 22
- OpenSSH server config file – sshd_config (located in /etc/ssh/)

## 1. Use SSH public key based login

OpenSSH server supports various authentication. It is recommended that you use public key based authentication. First, create the key pair using following ssh-keygen command on your local desktop/laptop:

DSA and RSA 1024 bit or lower ssh keys are considered weak. Avoid them. RSA keys are chosen over ECDSA keys when backward compatibility is a concern with ssh clients. All ssh keys are either ED25519 or RSA. Do not use any other type.

`$ ssh-keygen -t key_type -b bits -C "comment"$ ssh-keygen -t ed25519 -C "Login to production cluster at xyz corp"$ ssh-keygen -t rsa -b 4096 -f ~/.ssh/id_rsa_aws_$(date +%Y-%m-%d) -C "AWS key for abc corp clients"`
Next, install the public key using ssh-copy-id command:
`$ ssh-copy-id -i /path/to/public-key-file user@host$ ssh-copy-id user@remote-server-ip-or-dns-name$ ssh-copy-id vivek@rhel7-aws-server`
When promoted supply user password. Verify that ssh key based login working for you:
`$ ssh vivek@rhel7-aws-server`
[![OpenSSH server security best practices](https://www.cyberciti.biz/tips/wp-content/uploads/2009/07/OpenSSH-server-security-best-practices.png)](https://www.cyberciti.biz/tips/wp-content/uploads/2009/07/OpenSSH-server-security-best-practices.png)
For more info on ssh public key auth see:

- [keychain: Set Up Secure Passwordless SSH Access For Backup Scripts](https://www.cyberciti.biz/faq/ssh-passwordless-login-with-keychain-for-scripts/)
- [sshpass: Login To SSH Server / Provide SSH Password Using A Shell Script](https://www.cyberciti.biz/faq/noninteractive-shell-script-ssh-password-provider/)
- [How To Setup SSH Keys on a Linux / Unix System](https://www.cyberciti.biz/faq/how-to-set-up-ssh-keys-on-linux-unix/)
- [How to upload ssh public key to as authorized_key using Ansible DevOPS tool](https://www.cyberciti.biz/faq/how-to-upload-ssh-public-key-to-as-authorized_key-using-ansible/)

## 2. Disable root user login

Before we disable root user login, make sure regular user can log in as root. For example, allow vivek user to login as root using the sudo command.

### How to add vivek user to sudo group on a Debian/Ubuntu

Allow members of group sudo to execute any command. [Add user vivek to sudo group](https://www.cyberciti.biz/faq/how-to-create-a-sudo-user-on-ubuntu-linux-server/):
`$ sudo adduser vivek sudo`
Verify group membership with [id command](https://www.cyberciti.biz/faq/unix-linux-id-command-examples-usage-syntax/)
`$ id vivek`

### How to add vivek user to sudo group on a CentOS/RHEL server

Allows people in group wheel to run all commands on a CentOS/RHEL and Fedora Linux server. Use the usermod command to add the user named vivek to the wheel group:
`$ sudo usermod -aG wheel vivek$ id vivek`

### Test sudo access and disable root login for ssh

Test it and make sure user vivek can log in as root or run the command as root:
`$ sudo -i$ sudo /etc/init.d/sshd status$ sudo systemctl status httpd`
Once confirmed disable root login by adding the following line to sshd_config:
`PermitRootLogin noChallengeResponseAuthentication noPasswordAuthentication noUsePAM no`
See “[How to disable ssh password login on Linux to increase security](https://www.cyberciti.biz/faq/how-to-disable-ssh-password-login-on-linux/)” for more info.

## 3. Disable password based login

All password-based logins must be disabled. Only public key based logins are allowed. Add the following in your sshd_config file:
`AuthenticationMethods publickeyPubkeyAuthentication yes`
Older version of SSHD on CentOS 6.x/RHEL 6.x user should use the following setting:
`PubkeyAuthentication yes`

## 4. Limit Users’ ssh access

By default, all systems user can login via SSH using their password or public key. Sometimes you create UNIX / Linux user account for FTP or email purpose. However, those users can log in to the system using ssh. They will have full access to system tools including compilers and scripting languages such as Perl, Python which can open network ports and do many other fancy things. Only allow root, vivek and jerry user to use the system via SSH, add the following to sshd_config:
`AllowUsers vivek jerry`
Alternatively, you can allow all users to login via SSH but deny only a few users, with the following line in sshd_config:
`DenyUsers root saroj anjali foo`
You can also [configure Linux PAM](https://www.cyberciti.biz/tips/linux-pam-configuration-that-allows-or-deny-login-via-the-sshd-server.html) allows or deny login via the sshd server. You can allow [list of group name](https://www.cyberciti.biz/tips/openssh-deny-or-restrict-access-to-users-and-groups.html) to access or deny access to the ssh.

## 5. Disable Empty Passwords

You need to explicitly disallow remote login from accounts with empty passwords, update sshd_config with the following line:
`PermitEmptyPasswords no`

## 6. Use strong passwords and passphrase for ssh users/keys

It cannot be stressed enough how important it is to use strong user passwords and passphrase for your keys. Brute force attack works because user goes to dictionary based passwords. You can force users to avoid [passwords against a dictionary](https://www.cyberciti.biz/tips/linux-check-passwords-against-a-dictionary-attack.html) attack and use [john the ripper tool](https://www.cyberciti.biz/faq/unix-linux-password-cracking-john-the-ripper/) to find out existing weak passwords. Here is a sample random password generator (put in your ~/.bashrc):

Run it:
`genpasswd 16`
Output:

```
uw8CnDVMwC6vOKgW
```

- [Generating Random Password With mkpasswd / makepasswd / pwgen](https://www.cyberciti.biz/faq/generating-random-password/)
- [Linux / UNIX: Generate Passwords](https://www.cyberciti.biz/faq/linux-unix-generating-passwords-command/)
- [Linux Random Password Generator Command](https://www.cyberciti.biz/faq/linux-random-password-generator/)

## 7. Firewall SSH TCP port # 22

You need to firewall ssh TCP port # 22 by updating iptables/ufw/firewall-cmd or pf firewall configurations. Usually, OpenSSH server must only accept connections from your LAN or other remote WAN sites only.

### Netfilter (Iptables) Configuration

Update [/etc/sysconfig/iptables (Redhat and friends specific file) to accept connection](https://www.cyberciti.biz/faq/rhel-fedorta-linux-iptables-firewall-configuration-tutorial/)only from 192.168.1.0/24 and 202.54.1.5/29, enter:

If you’ve dual stacked sshd with IPv6, edit /etc/sysconfig/ip6tables (Redhat and friends specific file), enter:

Replace ipv6network::/ipv6mask with actual IPv6 ranges.

### UFW for Debian/Ubuntu Linux

[UFW is an acronym for uncomplicated firewall. It is used for managing a Linux firewall](https://www.cyberciti.biz/faq/howto-configure-setup-firewall-with-ufw-on-ubuntu-linux/)and aims to provide an easy to use interface for the user. Use the [following command to accept port 22 from 202.54.1.5/29](https://www.cyberciti.biz/faq/ufw-allow-incoming-ssh-connections-from-a-specific-ip-address-subnet-on-ubuntu-debian/) only:
`$ sudo ufw allow from 202.54.1.5/29 to any port 22`
Read “[Linux: 25 Iptables Netfilter Firewall Examples For New SysAdmins](https://www.cyberciti.biz/tips/linux-iptables-examples.html)” for more info.

### *BSD PF Firewall Configuration

If you are using PF firewall update [/etc/pf.conf](https://bash.cyberciti.biz/firewall/pf-firewall-script/) as follows:

```
pass in on $ext_if inet proto tcp from {192.168.1.0/24, 202.54.1.5/29} to $ssh_server_ip port ssh flags S/SA synproxy state
```

## 8. Change SSH Port and limit IP binding

By default, SSH listens to all available interfaces and IP address on the system. Limit ssh port binding and change ssh port (many brutes forcing scripts only try to connect to TCP port # 22). To bind to 192.168.1.5 and 202.54.1.5 IPs and port 300, add or correct the following line in sshd_config:

A better approach to use proactive approaches scripts such as fail2ban or denyhosts when you want to accept connection from dynamic WAN IP address.

## 9. Use TCP wrappers (optional)

TCP Wrapper is a host-based Networking ACL system, used to filter network access to the Internet. OpenSSH does support TCP wrappers. Just update your /etc/hosts.allow file as follows to allow SSH only from 192.168.1.2 and 172.16.23.12 IP address:

```
sshd : 192.168.1.2 172.16.23.12 
```

See this [FAQ about setting and using TCP wrappers](https://www.cyberciti.biz/faq/tcp-wrappers-hosts-allow-deny-tutorial/) under Linux / Mac OS X and UNIX like operating systems.

## 10. Thwart SSH crackers/brute force attacks

Brute force is a method of defeating a cryptographic scheme by trying a large number of possibilities (combination of users and passwords) using a single or distributed computer network. To prevents brute force attacks against SSH, use the following software:

- [DenyHosts](https://www.cyberciti.biz/faq/block-ssh-attacks-with-denyhosts/) is a Python based security tool for SSH servers. It is intended to prevent brute force attacks on SSH servers by monitoring invalid login attempts in the authentication log and blocking the originating IP addresses.
- Explains how to setup [DenyHosts](https://www.cyberciti.biz/faq/rhel-linux-block-ssh-dictionary-brute-force-attacks/) under RHEL / Fedora and CentOS Linux.
- [Fail2ban](https://www.fail2ban.org/) is a similar program that prevents brute force attacks against SSH.
- [sshguard](https://sshguard.sourceforge.net/) protect hosts from brute force attacks against ssh and other services using pf.
- [security/sshblock](http://www.bsdconsulting.no/tools/) block abusive SSH login attempts.
- [IPQ BDB filter](https://savannah.nongnu.org/projects/ipqbdb/) May be considered as a fail2ban lite.

## 11. Rate-limit incoming traffic at TCP port # 22 (optional)

Both netfilter and pf provides rate-limit option to perform simple throttling on incoming connections on port # 22.

### Iptables Example

The following example will drop incoming connections which make more than 5 connection attempts upon port 22 within 60 seconds:

Call above script from your iptables scripts. Another config option:

See iptables man page for more details.

### *BSD PF Example

The following will limits the maximum number of connections per source to 20 and rate limit the number of connections to 15 in a 5 second span. If anyone breaks our rules add them to our abusive_ips table and block them for making any further connections. Finally, flush keyword kills all states created by the matching rule which originate from the host which exceeds these limits.

## 12. Use port knocking (optional)

[Port knocking](https://en.wikipedia.org/wiki/Port_knocking) is a method of externally opening ports on a firewall by generating a connection attempt on a set of prespecified closed ports. Once a correct sequence of connection attempts is received, the firewall rules are dynamically modified to allow the host which sent the connection attempts to connect to the specific port(s). A sample port Knocking example for ssh using iptables:

For more info see:

- [Debian / Ubuntu: Set Port Knocking With Knockd and Iptables](https://www.cyberciti.biz/faq/debian-ubuntu-linux-iptables-knockd-port-knocking-tutorial/)

## 13. Configure idle log out timeout interval

A user can log in to the server via ssh, and you can set an idle timeout interval to avoid unattended ssh session. Open sshd_config and make sure following values are configured:
`ClientAliveInterval 300ClientAliveCountMax 0`
You are setting an idle timeout interval in seconds (300 secs == 5 minutes). After this interval has passed, the idle user will be automatically kicked out (read as logged out). See [how to automatically log BASH / TCSH / SSH users](https://www.cyberciti.biz/faq/linux-unix-login-bash-shell-force-time-outs/) out after a period of inactivity for more details.

## 14. Enable a warning banner for ssh users

Set a warning banner by updating sshd_config with the following line:
`Banner /etc/issue`
Sample /etc/issue file:

```
----------------------------------------------------------------------------------------------
You are accessing a XYZ Government (XYZG) Information System (IS) that is provided for authorized use only.
By using this IS (which includes any device attached to this IS), you consent to the following conditions:

+ The XYZG routinely intercepts and monitors communications on this IS for purposes including, but not limited to,
penetration testing, COMSEC monitoring, network operations and defense, personnel misconduct (PM),
law enforcement (LE), and counterintelligence (CI) investigations.

+ At any time, the XYZG may inspect and seize data stored on this IS.

+ Communications using, or data stored on, this IS are not private, are subject to routine monitoring,
interception, and search, and may be disclosed or used for any XYZG authorized purpose.

+ This IS includes security measures (e.g., authentication and access controls) to protect XYZG interests--not
for your personal benefit or privacy.

+ Notwithstanding the above, using this IS does not constitute consent to PM, LE or CI investigative searching
or monitoring of the content of privileged communications, or work product, related to personal representation
or services by attorneys, psychotherapists, or clergy, and their assistants. Such communications and work
product are private and confidential. See User Agreement for details.
----------------------------------------------------------------------------------------------

```

Above is a standard sample, consult your legal team for specific user agreement and legal notice details.

## 15. Disable .rhosts files (verification)

Don’t read the user’s ~/.rhosts and ~/.shosts files. Update sshd_config with the following settings:
`IgnoreRhosts yes`
SSH can emulate the behavior of the obsolete rsh command, just disable insecure access via RSH.

## 16. Disable host-based authentication (verification)

To disable host-based authentication, update sshd_config with the following option:
`HostbasedAuthentication no`

## 17. Patch OpenSSH and operating systems

It is recommended that you use tools such as [yum](https://www.cyberciti.biz/faq/rhel-centos-fedora-linux-yum-command-howto/), [apt-get](https://www.cyberciti.biz/tips/linux-debian-package-management-cheat-sheet.html), [freebsd-update](https://www.cyberciti.biz/tips/howto-keep-freebsd-system-upto-date.html) and others to keep systems up to date with the latest security patches:

## 18. Chroot OpenSSH (Lock down users to their home directories)

By default users are allowed to browse the server directories such as /etc/, /bin and so on. You can protect ssh, using os based chroot or use [special tools such as rssh](https://www.cyberciti.biz/tips/rhel-centos-linux-install-configure-rssh-shell.html). With the release of OpenSSH 4.8p1 or 4.9p1, you no longer have to rely on third-party hacks such as rssh or complicated chroot(1) setups to lock users to their home directories. See [this blog post](https://www.debian-administration.org/articles/590) about new ChrootDirectory directive to lock down users to their home directories.

## 19. Disable OpenSSH server on client computer

Workstations and laptop can work without OpenSSH server. If you do not provide the remote login and file transfer capabilities of SSH, disable and remove the SSHD server. CentOS / RHEL users can disable and remove openssh-server with the [yum command](https://www.cyberciti.biz/faq/rhel-centos-fedora-linux-yum-command-howto/):
`$ sudo yum erase openssh-server`
Debian / Ubuntu Linux user can disable and remove the same with the [apt command](https://www.cyberciti.biz/faq/ubuntu-lts-debian-linux-apt-command-examples/)/[apt-get command](https://www.cyberciti.biz/tips/linux-debian-package-management-cheat-sheet.html):
`$ sudo apt-get remove openssh-server`
You may need to update your iptables script to remove ssh exception rule. Under CentOS / RHEL / Fedora edit the files /etc/sysconfig/iptables and /etc/sysconfig/ip6tables. Once done [restart iptables](https://www.cyberciti.biz/faq/howto-rhel-linux-open-port-using-iptables/) service:
`# service iptables restart# service ip6tables restart`

## 20. Bonus tips from Mozilla

If you are using OpenSSH version 6.7+ or newer try [following](https://wiki.mozilla.org/Security/Guidelines/OpenSSH) settings:

You can grab list of cipher and alog supported by your OpenSSH server using the following commands:
`$ ssh -Q cipher$ ssh -Q cipher-auth$ ssh -Q mac$ ssh -Q kex$ ssh -Q key`
[![OpenSSH Security Tutorial Query Ciphers and algorithms choice](https://www.cyberciti.biz/tips/wp-content/uploads/2009/07/OpenSSH-Security-Tutorial-Query-Ciphers-and-algorithms-choice.jpg)](https://www.cyberciti.biz/tips/wp-content/uploads/2009/07/OpenSSH-Security-Tutorial-Query-Ciphers-and-algorithms-choice.jpg)

## How do I test sshd_config file and restart/reload my SSH server?

To [check the validity of the configuration file and sanity of the keys](https://www.cyberciti.biz/tips/checking-openssh-sshd-configuration-syntax-errors.html) for any errors before restarting sshd, run:
`$ sudo sshd -t`
Extended test mode:
`$ sudo sshd -T`
Finally [restart sshd on a Linux or Unix like systems](https://www.cyberciti.biz/faq/howto-restart-ssh/) as per your distro version:
`$ sudo systemctl start ssh ## Debian/Ubunt Linux##$ sudo systemctl restart sshd.service ## CentOS/RHEL/Fedora Linux##$ doas /etc/rc.d/sshd restart ## OpenBSD##$ sudo service sshd restart ## FreeBSD##`

## Other susggesions

1. [Tighter SSH security with 2FA](https://www.cyberciti.biz/open-source/howto-protect-linux-ssh-login-with-google-authenticator/) – Multi-Factor authentication can be enabled with [OATH Toolkit](http://www.nongnu.org/oath-toolkit/) or [DuoSecurity](https://duo.com/).
2. [Use keychain based authentication](https://www.cyberciti.biz/faq/ssh-passwordless-login-with-keychain-for-scripts/) – keychain is a special bash script designed to make key-based authentication incredibly convenient and flexible. It offers various security benefits over passphrase-free keys