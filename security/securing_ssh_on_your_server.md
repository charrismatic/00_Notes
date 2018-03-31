https://devops.profitbricks.com/tutorials/secure-the-ssh-server-on-ubuntu/

Secure the SSH server on Ubuntu




by hitjethva on Oct 13, 2015



Table of Contents
Introduction
Requirements
Installing SSH
Configure SSH to log in with SSH keys instead of a password
Generate SSH keys
Create an SSH folder
Copy the public key file to your server
Update the public key file
Secure the SSH configuration file
Change the default SSH port
Use SSH2
Use a whitelist and a blacklist to limit user access
Disable root login
Hide last login
Restrict SSH logins to specific IP addresses
Disable password authentication
Disable .rhosts
Disable host-based authentication
Set a login grace timeout
Set maximum startup connections
Disable forwarding
Log more information
Disable empty passwords
Set idle timeout interval
Restart SSH for the changes to take effect
Secure SSH using TCP wrappers
Secure SSH using iptables


---


Introduction
Secure Shell (SSH) is a protocol used to provide secure and encrypted communication over a network. It is most widely used by Linux system administrators for remote server management. It can also be used to transfer files over a network. Therefore, SSH security is very important.

Requirements
A server running Ubuntu v. 14.04
A desktop machine running Linux (suggested)
Installing SSH
To install the SSH server on your server, run the following command:

sudo apt-get install openssh-server
To install the SSH client on your desktop, run the following command:

sudo apt-get install openssh-client
Configure SSH to log in with SSH keys instead of a password
Using passwords for SSH authentication is insecure. If one of your users sets a weak password, your server can be compromised. To avoid this, you can use ssh key for authentication without a password.

Generate SSH keys
To generate SSH keys on your client machine, run the following command:

cd ~/.ssh
ssh-keygen -t rsa
Simply press the enter key at every question. This will produce two files: id_rsa.pub (the public key) and id_rsa (the private key).

This will output something like.

ssh keygen

Create an SSH folder
On your server, create the folder for SSH with the command:

mkdir -p ~/.ssh/
Copy the public key file to your server
On your desktop, copy the id_dsa.pub file to your server using the following command:

scp -P "ssh-port" ~/.ssh/id_dsa.pub username@serverip-address:~/.ssh
Update the public key file
Change the filename and permissions:

cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
chmod 700 .ssh
chmod 600 .ssh/authorized_keys
rm .ssh/id_rsa.pub
Now you can log into your SSH server without a password.

Run the following command from your desktop to test it.

ssh -P "ssh-port" username@serverip-address
Secure the SSH configuration file
You can change the default security options by editing /etc/ssh/sshd_config.

sudo nano /etc/ssh/sshd_config
Here are some suggestions for default settings that you may want to change.

Once you have made your changes, be sure to save and exit the sshd_config file and restart the SSH server with:

sudo service ssh restart
Change the default SSH port
By default, most servers listen for SSH connections on port 22. Hackers can use a port scanner to find whether an SSH service running or not. So it is recommended to change the default port.

To change default port from 22 to 8908, change the following line:

Port 8908
Use SSH2
SSH protocol 1 (SSH1) contains many security vulnerabilities. Using protocol 2 (SSH2) instead is strongly recommended.

By default, SSH2 should be set. If not then change the Protocol line to use SSH2.

Protocol 2
Use a whitelist and a blacklist to limit user access
Using a whitelist to allow specific users SSH access, and a blacklist to disallow other users, will improve your SSH security.

To allow validuser1 and validuser2, add the following line:

AllowUsers validuser1 validuser2
To deny baduser1 and baduser2, add the following line:

DenyUser baduser1 baduser2
Disable root login
A common attack is to attempt to use root to log into a server with SSH. Since this is a big security risk, disable root SSH login by changing PermitRootLogin from without-password to:

PermitRootLogin no
Hide last login
You can hide last login user by editing the following line.

PrintLastLog no
Restrict SSH logins to specific IP addresses
By default SSH will accept connections from any external IP address. If you want to restrict SSH to only allow a connection from a specific IP address, you can add a ListenAddress line.

For example, if you want to only accept SSH connections from IP address 192.168.1.2 you would add the line:

ListenAddress 192.168.1.2
Disable password authentication
Password authentication in SSH is a big security risk if your user sets a weak password. See this section for instructions on how to set up SSH key authentication

To disable password authentication change the PasswordAuthentication line to read:

PasswordAuthentication no
Disable .rhosts
By default SSH doesn't allow rhosts. The .rhosts files specify which users can access the r-commands (such as rcp and rsh) on the local system without a password.

To disable rhosts:

IgnoreRhosts yes
RhostsAuthentication no
RSAAuthentication yes
Disable host-based authentication
SSH's host-based authentication is more secure than rhosts authentication. However, trusted hosts are still considered a security risk.

By default the HostbasedAuthentication option is disabled, if not then change the following line:

HostbasedAuthentication no
Set a login grace timeout
The "LoginGraceTime" specifies how long after a connection request the SSH server will wait before disconnecting. The recommended value for login grace timeout is 60 seconds.

You can change this value by editing following line:

LoginGraceTime 60
Set maximum startup connections
Limiting the maximum number of concurrent connections to the SSH daemon can help protect your SSH server from a brute force attack.

You can set this value by editing following line to the number of concurrent connections you want to allow. For this example, we have chosen 2:

MaxStartups 2
Disable forwarding
Hackers can user port forwarding technique to tunnel network connections through an SSH session to login into systems.

To disable this change the following lines:

AllowTcpForwarding no
X11Forwarding no
Log more information
By default, SSH logs everything. If you want to log more information like failed login attempts. you can change the value from INFO to VERBOSE.

For this change the following line:

LogLevel VERBOSE
Disable empty passwords
You will want to deny login to users with an empty (blank) password.

By default this option is disabled, if not then change the following line:

PermitEmptyPasswords no
Set idle timeout interval
SSH allows users to set an idle timeout interval. After this interval has passed, the idle user will be automatically logged out.

You can set the number of seconds by adding the following line:

ClientAliveInterval 300
ClientAliveCountMax 0
Restart SSH for the changes to take effect
Once you have finished editing the /etc/ssh/sshd_config file, save and exit the fire, then restart the SSH server:

sudo service ssh restart
Secure SSH using TCP wrappers
TCP wrapper provides host-based access control to network services, which is used to filter network access to the internet.

You can allow SSH only from the IP addresses 192.168.1.100 and 172.16.20.10 IP's by editing the /etc/hosts.allow file.

sudo nano /etc/hosts.allow
Add the following line:

sshd : 192.168.1.100 172.16.20.10
Secure SSH using iptables
You can restrict SSH connection to only allow authorized IP addresses.

To allow SSH connections only from 192.168.1.200 run the following command:

sudo iptables -A INPUT -p tcp -m state --state NEW --source 192.168.1.200 --dport 8908 -j ACCEPT
To disable SSH connection from all other hosts run the following command:

sudo iptables -A INPUT -p tcp --dport 8908 -j DROP
Now save your new rules using following command:

sudo iptables-save > /etc/iptables/rules.v4
