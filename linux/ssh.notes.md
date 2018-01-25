notes on ssh-keygen and best practices for making keys

README: https://stribika.github.io/2015/01/04/secure-secure-shell.html

Ubuntu | SSH/OpenSSH/Keys
https://help.ubuntu.com/community/SSH/OpenSSH/Keys

ref: https://security.stackexchange.com/questions/143442/ssh-keygen-best-practices
/> ssh-keygen -t rsa -b 4096 -o -a 100 -C user@name -f file_name_rsa_409



Introduction
#https://help.ubuntu.com/community/SSH/OpenSSH/Keys
sudo cp /etc/ssh/sshd_config /etc/ssh/sshd_config.factory-defaults
sudo chmod a-w /etc/ssh/sshd_config.factory-defaults



~/.ssh/config
# MULTIPLE ACCOUNTS / SETTINGS

Host local-computer
  Hostname 192.168.1.1
  User username
  RSAAuthentication yes
  IdentityFile ~/.ssh/ssh_id
  ServerAliveInterval 120
  ServerAliveCountMax 15


Host remote-server
  Hostname 192.168.1.122
  User username
  IdentityFile ~/.ssh/ssh_id
  ServerAliveInterval 60
  ServerAliveCountMax 10
