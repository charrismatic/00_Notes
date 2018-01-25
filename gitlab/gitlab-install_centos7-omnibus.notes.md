gitlab: Thank you for installing GitLab!
gitlab: To configure and start GitLab, RUN THE FOLLOWING COMMAND:

sudo gitlab-ctl reconfigure

gitlab: GitLab should be reachable at http://es-higgs.collider
gitlab: Otherwise configure GitLab for your system by editing /etc/gitlab/gitlab.rb file
gitlab: And running reconfigure again.
gitlab: 
gitlab: For a comprehensive list of configuration options please see the Omnibus GitLab readme
gitlab: https://gitlab.com/gitlab-org/omnibus-gitlab/blob/master/README.md
gitlab: 
It looks like GitLab has not been configured yet; skipping the upgrade script.
  Verifying  : gitlab-ce-9.4.3-ce.0.el7.x86_64                                                  1/1 

Installed:
  gitlab-ce.x86_64 0:9.4.3-ce.0.el7                                                                 

# OMNIBUS INSTALLER
https://about.gitlab.com/installation/#centos-7

# CE

1. Install and configure the necessary dependencies

If you install Postfix to send email please select 'Internet Site' during setup. Instead of using Postfix you can also use Sendmail or configure a custom SMTP server and configure it as an SMTP server.

On CentOS, the commands below will also open HTTP and SSH access in the system firewall.

sudo yum install curl policycoreutils openssh-server openssh-clients -y
sudo systemctl enable sshd
sudo systemctl start sshd
sudo yum install postfix
sudo systemctl enable postfix
sudo systemctl start postfix
sudo firewall-cmd --permanent --add-service=http
sudo systemctl reload firewalld


2. Add the GitLab package server and install the package

curl -sS https://packages.gitlab.com/install/repositories/gitlab/gitlab-ce/script.rpm.sh | sudo bash
sudo yum install gitlab-ce -y

If you are not comfortable installing the repository through a piped script, you can find the entire script here and select and download the package manually and install using

curl -LJO https://packages.gitlab.com/gitlab/gitlab-ce/packages/el/7/gitlab-ce-XXX.rpm/download
rpm -i gitlab-ce-XXX.rpm

3. Configure and start GitLab

sudo gitlab-ctl reconfigure
4. Browse to the hostname and login

On your first visit, you'll be redirected to a password reset screen to provide the password for the initial administrator account. Enter your desired password and you'll be redirected back to the login screen.

The default account's username is root. Provide the password you created earlier and login. After login you can change the username if you wish.







# MANUAL INSTALL
https://gitlab.com/gitlab-org/gitlab-recipes/tree/master/install/centos
